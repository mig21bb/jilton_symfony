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
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\Common\Collections\ExpressionBuilder;
use Doctrine\ORM\Query\Expr;


Class RoomDAO {

	public function __construct(){		
		
	}

	public function getRoomsByHotelIdDAO($idHotel){		

		$this->conexion=Conexion::conectar();

		$rooms=[];
		$sql="SELECT * FROM JILTON_ROOMS WHERE idHotel=".$idHotel;
		$consulta=$this->conexion->query($sql);
		while($fila=$consulta->fetch_array()){
			$room= new Room($fila['numeroRoom'],
								$fila['activa'],								
								$fila['idHotel'],
								$fila['numeroPlanta'],
								$fila['fCreacion'],
								$fila['fModificacion'],
								$fila['fBorrado']
								);
			
			$rooms[]=$room;

		}
		//var_dump($rooms);
		// $this->conexion=Conexion::desconectar();
		return $rooms;
		
	}

	public function generateRoomDAO($idHotel,
								$numeroPlanta,
								$numeroRoom){

		$this->conexion=Conexion::conectar();

		// echo 'into roomDAO from submition';
		// 	echo '<br>';

		$date = date('Y-m-d h:i:s', time());
		
		$sql="INSERT INTO JILTON_ROOMS (idHotel,
										numeroPlanta,
										numeroRoom,
										activa,
										fCreacion,
										fModificacion)
										VALUES
										($idHotel,
										$numeroPlanta,
										$numeroRoom,
										1,
										'$date',
										'$date')";
		// echo $sql;
		// 	echo '<br>';

		if($this->conexion->query($sql)){			
			return true;
		}else{
			return 0;
		}
				
		
	}

	public function generateRoomClass($idHotel,
								$numeroPlanta,
								$numeroRoom,
								$class){

		$this->conexion=Conexion::conectar();	
		
		$sql="INSERT INTO JILTON_ROOM_CLASS (idHotel,
										numeroPlanta,
										numeroRoom,
										price,
										idClass)
										VALUES
										($idHotel,
										$numeroPlanta,
										$numeroRoom,
										100,
										$class)";
		// echo $sql;
		// 	echo '<br>';

		if($this->conexion->query($sql)){			
			return true;
		}else{
			return 0;
		}
				
		
	}

	public function getRoomDAO($idHotel,$numeroPlanta,$numeroRoom){

		
		$this->conexion=Conexion::conectar();

		
		$sql="SELECT * FROM JILTON_ROOMS WHERE idHotel=$idHotel and numeroPlanta=$numeroPlanta and numeroRoom=$numeroRoom";
		$consulta=$this->conexion->query($sql);
		$fila=$consulta->fetch_array();
		$room= new Room($fila['numeroRoom'],
							$fila['activa'],								
							$fila['idHotel'],
							$fila['numeroPlanta'],
							$fila['fCreacion'],
							$fila['fModificacion'],
							$fila['fBorrado']
							);
		// var_dump($room);
		// echo '<br>';
		// echo '<br>';
		// echo '<br>';

		$sql="SELECT * FROM JILTON_ROOM_PIC WHERE idHotel=$idHotel and numeroPlanta=$numeroPlanta and numeroRoom=$numeroRoom";
		$consulta=$this->conexion->query($sql);
		$fila=$consulta->fetch_array();
		$room->setRoomPicture($fila['url']);

		// var_dump($room);
		// echo '<br>';
		// echo '<br>';
		// echo '<br>';

		$sql="SELECT * FROM JILTON_ROOM_CLASS WHERE idHotel=$idHotel and numeroPlanta=$numeroPlanta and numeroRoom=$numeroRoom";
		$consulta=$this->conexion->query($sql);
		$fila=$consulta->fetch_array();
		$room->setRoomPrice($fila['price']);
		$idClass=$fila['idClass'];

		// var_dump($room);
		// echo '<br>';
		// echo '<br>';
		// echo '<br>';

		$sql="SELECT * FROM JILTON_CLASS WHERE idClass=$idClass";
		$consulta=$this->conexion->query($sql);
		$fila=$consulta->fetch_array();
		$room->setRoomClass($fila['roomClass']);

/*
		$sql="SELECT * FROM JILTON_OCUPACIONES WHERE idHotel=$idHotel AND numeroPlanta=$numeroPlanta AND numeroRoom=$numeroRoom AND fSalida>=SYSDATE";

id
fEntrada
fSalida
fCreacion
activo
numeroRoom
idHotel
idCliente
numeroPlanta
*/
		return $room;
		
	}

	} ?>