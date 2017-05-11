<?php 

namespace AppBundle\Delegate;

//Incluyo las clases reflejo de las tablas
use AppBundle\Entity\JiltonClass;
use AppBundle\Entity\JiltonClientes;
use AppBundle\Entity\JiltonHotel;
use AppBundle\Entity\JiltonHotelPic;
use AppBundle\Entity\JiltonOcupaciones;
use AppBundle\Entity\JiltonPlantas;
use AppBundle\Entity\JiltonRoomClass;
use AppBundle\Entity\JiltonRoomPic;
use AppBundle\Entity\JiltonRooms;
use AppBundle\Dao\HotelDAO;

Class JiltonDelegate {

	public function __construct(){
			
	}

	public function listadoHotelesDelegate(){

		$hotelDAO= new HotelDAO();

		$hoteles = $hotelDAO->listadoHotelesDAO();

		$plantaDAO = new PlantaDAO();

		for ($i=0; $i < count($hoteles) ; $i++) {
			$hoteles[$i]->setPlantas($plantaDAO->getPlantasByHotelIdDAO($hoteles[$i]->getIdHotel()));
		}

		$roomDAO = new RoomDAO();

		for ($i=0; $i < count($hoteles) ; $i++) {
			$hoteles[$i]->setHabitaciones($roomDAO->getRoomsByHotelIdDAO($hoteles[$i]->getIdHotel()));
		}

	return $hoteles;



	}

	public function getHotelDelegate($idHotel){

		$hotelDAO= new HotelDAO();
		$plantaDAO = new PlantaDAO();
		$roomDAO = new RoomDAO();
		$hotel = $hotelDAO->getHotelDAO($idHotel);
		$hotel->setPlantas($plantaDAO->getPlantasByHotelIdDAO($hotel->getIdHotel()));
		$hotel->setHabitaciones($roomDAO->getRoomsByHotelIdDAO($hotel->getIdHotel()));

		//var_dump($hotel);
		return $hotel;

		
	}

	public function getHotelPictureDelegate($idHotel){

		$hotelDAO= new HotelDAO();

		return $hotelDAO->getHotelPictureDAO($idHotel);
		
	}

	public function createHotelDelegate($nombre,
								$ubicacion,
								$plantas,
								$estrellas,
								$hpp,
								$sky,	
								$celebrity,	
								$signature,	
								$royal,	
								$penthouse,	
								$reflection,	
								$master,	
								$nett,	
								$pic){

		$hotelDAO= new HotelDAO();
		$plantaDAO= new PlantaDAO();
		$roomDAO= new RoomDAO();

		//Distribución de probabilidad acumulada de la clase de la habitación
		$roomProb= array( 1=> $sky+0,
						2=> $sky+$celebrity,
						3=> $sky+$celebrity+$signature,
						4=> $sky+$celebrity+$signature+$royal,
						5=> $sky+$celebrity+$signature+$royal+$penthouse,
						6=> $sky+$celebrity+$signature+$royal+$penthouse+$reflection,
						7=> $sky+$celebrity+$signature+$royal+$penthouse+$reflection+$master,
						8=> $sky+$celebrity+$signature+$royal+$penthouse+$reflection+$master+$nett);
		// var_dump($roomProb);

		// echo 'into into createHotelDelegate';
		// 	echo '<br>';

		$idHotel = $hotelDAO->createHotelDAO($nombre,
									$ubicacion,
									$estrellas);

		if($idHotel >0){
			for($i=1;$i<=$plantas;$i++){
				if($plantaDAO->generatePlantaDAO($idHotel,$i)){
					for ($j=1; $j<=$hpp ; $j++) { 
						$roomDAO->generateRoomDAO($idHotel,$i,$j);
						$class=1;
						$rand=rand(1,99);
						// echo $rand.' - ';	
						for ($k=1;$k<=count($roomProb);$k++) {
							// echo $k.'->'.$roomProb[$k].' - ';
							if($rand<$roomProb[$k]){
								$class = $k;
								$k=count($roomProb);
							}

						}
						// echo $class;
						// echo '<br>';
						$roomDAO->generateRoomClass($idHotel,$i,$j,$class);
					}
				}
			}
			$hotelDAO->saveImage($idHotel,$pic);
			return $idHotel;
		}else{
			return 0;
		}
		
	}

	public function getRoomDelegate($idHotel,$numeroPlanta,$numeroRoom){

		$roomDAO= new RoomDAO();

		$hotelDAO = new HotelDAO();

		$room = $roomDAO->getRoomDAO($idHotel,$numeroPlanta,$numeroRoom);

		return $room;


		
	}



	} ?>