<?php

namespace AppBundle\Dao;

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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\Common\Collections\ExpressionBuilder;
use Doctrine\ORM\Query\Expr;


//Incluyo las clases reflejo de las tablas
Class HotelDAO extends Controller{

	public function __construct(){

	}


	//Recuperar todos los hoteles.
	public function listadoHotelesDAO(){

		$repository = $this->getDoctrine()->getRepository('AppBundle:JiltonHotel');

        // dynamic method names to find a group of products based on a column value
        $hoteles = $repository->findAll();

		return $hoteles;
		//var_dump($hoteles);
	}






	public function getHotelDAO($idHotel){
		$this->conexion=Conexion::conectar();
		
		
		$sql="SELECT H.* FROM JILTON_HOTEL AS H WHERE H.idHotel=$idHotel";
		$consulta=$this->conexion->query($sql);
		$fila=$consulta->fetch_array();
				$hotel= new Hotel(	$fila['idHotel'],
								$fila['nombre'],
								$fila['ubicacion'],
								$fila['estrellas'],
								$fila['activo'],
								$fila['fCreacion'],
								$fila['fModificacion'],
								$fila['fBorrado']);
		
		return $hotel;
		//var_dump($hotel);
	}
	public function getHotelPictureDAO($idHotel){
				$this->conexion=Conexion::conectar();
		
		$sql="SELECT P.* FROM JILTON_HOTEL_PIC AS P WHERE P.idHotel=$idHotel";
		$consulta=$this->conexion->query($sql);
		$fila=$consulta->fetch_array();
				$pic= new PictureHotel(	$fila['idhotel'],
								$fila['url']);
		
		return $pic;
		//var_dump($hotel);
	}

	public function createHotelDAO($nombre,
								$ubicacion,								
								$estrellas){

		echo 'into createhotelDAO from submition';
			echo '<br>';

		$this->conexion=Conexion::conectar();

		$date = date('Y-m-d h:i:s', time());
		
		$sql="INSERT INTO JILTON_HOTEL (nombre,
										ubicacion,
										estrellas,
										activo,
										fCreacion,
										fModificacion)
										VALUES
										('$nombre',
										'$ubicacion',
										$estrellas,
										1,
										'$date',
										'$date')";
		echo $sql;
			echo '<br>';

		if($this->conexion->query($sql)){
			$idhotel=$this->conexion->insert_id;
			return $idhotel;
		}else{
			echo '¡¡Error inserting hotel!!';
			echo '<br>';
			return 0;
		}
				
		
	}

	public function saveImage($idHotel,
								$url){

		// echo 'into save imageDAO from submition';
		// 	echo '<br>';
		$this->conexion=Conexion::conectar();		
		
		$sql="INSERT INTO JILTON_HOTEL_PIC (idHotel,
										url)
										VALUES
										($idHotel,
										'$url')";

		if($this->conexion->query($sql)){
			
			return true;
		}else{
			return 0;
		}
				
		
	}
}

 ?>