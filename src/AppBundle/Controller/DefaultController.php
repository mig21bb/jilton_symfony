<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Delegate\JiltonDelegate;
use AppBundle\Entity\JiltonClass;
use AppBundle\Entity\JiltonClientes;
use AppBundle\Entity\JiltonHotel;
use AppBundle\Entity\JiltonHotelPic;
use AppBundle\Entity\JiltonOcupaciones;
use AppBundle\Entity\JiltonPlantas;
use AppBundle\Entity\JiltonRoomClass;
use AppBundle\Entity\JiltonRoomPic;
use AppBundle\Entity\JiltonRooms;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;




class DefaultController extends Controller
{
    private $jiltonDelegate;


    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/listado", name="listado")
     */
    public function listadoAction(Request $request)
    {
    
        echo "listado";        

        $repository = $this->getDoctrine()->getRepository('AppBundle:JiltonHotel');

        $hoteles = $repository->findAll();

       
        return $this->render('listadoHotelesView.html.twig', ["hoteles"=>$hoteles,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/viewHotel/{id}", name="viewHotel")
     */
    public function viewHotelAction(Request $request,$id)
    {
        // replace this example code with whatever you need
        //echo "viewHotel";
        //$id=$request->request->get("idHotel");        
        //echo 'Id ='.$id;

        $entityManager = $this->getDoctrine()->getManager();

        $hotel = $entityManager->find('AppBundle:JiltonHotel', $id);

        return $this->render('hotelView.html.twig', ["hotel"=>$hotel,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/viewRoom/{idHotel}/{numeroPlanta}/{numeroRoom}", name="viewRoom")
     */
    public function viewRoomAction(Request $request,$idHotel,$numeroPlanta,$numeroRoom)
    {
        // replace this example code with whatever you need
        //echo "viewRoom";
        $room = $this->getRoomDelegate($idHotel,$numeroPlanta,$numeroRoom);
        
        //Habitaciones por planta del hotel al que pertenece la habitación.
        $plantas = $room->getIdHotel()->getPlantas()->count();
        //echo $plantas;
        $rooms = count($room->getIdHotel()->getRooms());
        //echo $rooms;
        $rpp=round($rooms/$plantas, 0, PHP_ROUND_HALF_UP);
        //echo '<br>rpp = ';
        //echo $rpp;


        return $this->render('roomView.html.twig', ["room" => $room,"rpp" => $rpp,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/newHotel", name="newHotel")
     */
    public function newHotelAction(Request $request)
    {
        // replace this example code with whatever you need
        //echo "newHotel";

        $repository = $this->getDoctrine()->getRepository('AppBundle:JiltonClass');

        $classes = $repository->findAll();

        return $this->render('newHotelView.html.twig', ['classes'=> $classes,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/createHotel", name="createHotel")
     */
    public function createHotelAction(Request $request)
    {
        // replace this example code with whatever you need
        //echo "createHotel";
        $newHotel = new JiltonHotel();        
        $newHotel -> setNombre($request->request->get("nombre"));
        $newHotel -> setUbicacion($request->request->get("ubicacion"));
        //$newHotel -> setPlantas($request->request->get("plantas"));
        $newHotel -> setEstrellas($request->request->get("estrellas"));
        $newHotel -> setHotelpic($request->request->get("pic")
        );
        $newHotel -> setFcreacion(new \DateTime("now"));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($newHotel);
        $entityManager->flush();
        $precioBase = $request->request->get("precioBase");
        $jiltonClasses = $this->getDoctrine()->getRepository('AppBundle:JiltonClass')->findAll();
        $multiplicadoresPrecio= array();
        foreach ($jiltonClasses as $c) {
            $multiplicadoresPrecio[$c->getIdclass()] = $c->getPricemulti();
        }

        echo '<br>newHotel ID = '.$newHotel->getId();
        echo '<br>';
        echo '<br>classes = ';
        var_dump($request->request->get("classes"));
        echo '<br>';
        echo '<br>multiplicadoresPrecio = ';
        var_dump($multiplicadoresPrecio);

        //Distribución de probabilidad de las clases de las habitaciones.
        //var_dump($request->request);
        $probabilidadAcumulada=0;
        $classes = $request->request->get("classes");
        foreach($classes as $c => $p){
            $classes[$c] = $p+$probabilidadAcumulada;
            $probabilidadAcumulada=$p+$probabilidadAcumulada;
            echo '<br>PA de '.$c.' = '.$probabilidadAcumulada;
        }
        echo '<br>classes = ';
        var_dump($classes);

        echo '<br>Plantas = '.$request->request->get("plantas");
        $plantas=array();
        $rooms=array();
        for ($i=1;$i<=$request->request->get("plantas");$i++){
            $planta = new JiltonPlantas();
            $planta->setNumeroplanta($i);
            $planta->setActiva(1);
            $planta->setIdHotel($newHotel);
            $entityManager->persist($planta);
            $entityManager->flush();
            array_push($plantas, $planta);

            echo '<br>Planta numero = '.$i.' id='.$planta->getId();
            for($r=1;$r<=$request->request->get("hpp");$r++){
                $room = new JiltonRooms();
                $room -> setIdHotel($newHotel);
                $room -> setNumeroplanta($planta);
                $room -> setNumeroroom($r);
                $room -> setActiva(1);
                $room -> setFcreacion(new \DateTime("now"));
                $rand=rand(1,$probabilidadAcumulada);
                echo '<br>rand = '.$rand;                      
                foreach ($classes as $idclass => $prob) {
                    //echo '<br>idclass = '.$idclass.' prob ='.$prob;
                    if($rand<=$prob && is_null($room->getIdclass())){
                        $class=$entityManager->find('AppBundle:JiltonClass', $idclass);
                        $room ->setIdclass($class); 
                        $room ->setRoomPic($class->getDefaultPic()); 

                        break;          
                    }
                }
                $room -> setPrecionoche($precioBase*$room->getIdclass()->getPricemulti());
                echo '<br>Habitacion numero = '.$r.' id='.$room->getId().' class= '.$room->getIdClass()->getRoomclass();
                $entityManager->persist($room);
                $entityManager->flush();
                array_push($rooms, $room);
            }




        }
        $hotel = $entityManager->find('AppBundle:JiltonHotel', $newHotel->getId());

        $hotel->setPlantas($plantas);
            $hotel->setRooms($rooms);

        return $this->render('hotelView.html.twig', ['hotel'=>$hotel,
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);

    }
    
    /**
     * @Route("/editRoom/{idHotel}/{numeroPlanta}/{numeroRoom}", name="editRoom")
     */
    public function editRoomAction(Request $request,$idHotel,$numeroPlanta,$numeroRoom)
    {
        // replace this example code with whatever you need
        //echo "editRoom";
        $this->jiltonDelegate = new JiltonDelegate();
        $room = $this->getRoomDelegate($idHotel,$numeroPlanta,$numeroRoom);
        //Habitaciones por planta del hotel al que pertenece la habitación.
        $plantas = $room->getIdHotel()->getPlantas()->count();
        //echo $plantas;
        $rooms = count($room->getIdHotel()->getRooms());
        //echo $rooms;
        $rpp=round($rooms/$plantas, 0, PHP_ROUND_HALF_UP);
        //echo '<br>rpp = ';
        //echo $rpp;
        $form = $this->createFormBuilder($room)
        //->add('numeroroom', IntegerType::class)
        //->add('fcreacion', DateTimeType::class)
        //->add('fmodificacion', DateTimeType::class)
        //->add('fborrado', DateTimeType::class)
        ->add('roompic', TextType::class)
        //->add('numeroplanta', IntegerType::class)
        //->add('idHotel', IntegerType::class)
        //->add('idclass', IntegerType::class)
            ->add('activa', CheckboxType::class, array('required' => false))
            ->add('precionoche', MoneyType::class)
            ->add('save', SubmitType::class, array('label' => 'Guardar Cambios'))
            ->getForm();

        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $room = $form->getData();
        //var_dump($room);

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        $em = $this->getDoctrine()->getManager();
        $em->persist($room);
        $em->flush();

        return $this->redirectToRoute('viewHotel',array('id'=>$idHotel));//.'/'.$numeroPlanta.'/'.$numeroRoom);
    }

        return $this->render('updateRoomView.html.twig', ['room'=>$room,'rpp'=>$rpp,'form' => $form->createView(),

            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/updateRoom/", name="updateRoom")
     */
    public function updateRoomAction(Request $request)
    {
        // replace this example code with whatever you need
        echo "editRoom";
        $this->jiltonDelegate = new JiltonDelegate();
        $room = $this->getRoomDelegate($idHotel,$numeroPlanta,$numeroRoom);
        //Habitaciones por planta del hotel al que pertenece la habitación.
        $plantas = $room->getIdHotel()->getPlantas()->count();
        echo $plantas;
        $rooms = count($room->getIdHotel()->getRooms());
        echo $rooms;
        $rpp=round($rooms/$plantas, 0, PHP_ROUND_HALF_UP);
        echo '<br>rpp = ';
        echo $rpp;
        $form = $this->createFormBuilder($room)
            ->add('activa', CheckboxType::class)
            ->add('precionoche', MoneyType::class)
            ->add('save', SubmitType::class, array('label' => 'Guardar Cambios'))
            ->getForm();

        return $this->render('updateRoomView.html.twig', ['room'=>$room,'rpp'=>$rpp,'form' => $form->createView(),
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }


    private function getRoomDelegate($idHotel,$numeroPlanta,$numeroRoom){
        //echo '<br> into private getRoomDelegate';
        $entityManager = $this->getDoctrine()->getManager();

        $qbp = $entityManager->createQueryBuilder();

        $qbp ->select('p')
            ->from('AppBundle:JiltonPlantas','p')
            ->where($qbp->expr()->andX(
                $qbp->expr()->eq('p.idHotel', $idHotel),
                $qbp->expr()->eq('p.numeroplanta', $numeroPlanta)
            ));

        $planta = $qbp->getQuery()->getSingleResult();

        $qbr = $entityManager->createQueryBuilder();

        $qbr ->select('r')
            ->from('AppBundle:JiltonRooms','r')
            //->where('r.id=1')
            
            ->where($qbr->expr()->andX(
                $qbr->expr()->eq('r.idHotel', $idHotel),
                $qbr->expr()->eq('r.numeroplanta', $planta->getId()),
                $qbr->expr()->eq('r.numeroroom', $numeroRoom)
            ))
            
        ;
        $room = $qbr->getQuery()->getSingleResult();
        //var_dump($room) ;
        return $room;
        


    }
}
