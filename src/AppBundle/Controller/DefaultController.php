<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Delegate\JiltonDelegate;



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
        echo "viewHotel";
        //$id=$request->request->get("idHotel");        
        echo 'Id ='.$id;

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
        echo "viewRoom";

        $entityManager = $this->getDoctrine()->getManager();

        $qb = $entityManager->createQueryBuilder();

        $qb ->select('r')
            ->from('AppBundle:JiltonRooms','r')
            //->where('r.id=1')
            
            ->where($qb->expr()->andX(
                $qb->expr()->eq('r.idHotel', $idHotel),
                $qb->expr()->eq('r.numeroplanta', $numeroPlanta),
                $qb->expr()->eq('r.numeroroom', $numeroRoom)
            ))
            
        ;
        $room = $qb->getQuery()->getSingleResult();
        //var_dump($room) ;

        //Habitaciones por planta del hotel al que pertenece la habitación.
        $plantas = $room->getIdHotel()->getPlantas()->count();
        echo $plantas;
        $rooms = count($room->getIdHotel()->getRooms());
        echo $rooms;
        $rpp=$rooms/$plantas;
        echo $rpp;


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
        echo "newHotel";

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
        echo "createHotel";
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/editRoom", name="editRoom")
     */
    public function editRoomAction(Request $request)
    {
        // replace this example code with whatever you need
        echo "editRoom";
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
