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


Class PlantaDAO {

	protected $conexion;	

	public function __construct(){

		
	}

	public function getPlantasByHotelIdDAO($idHotel){		

		$this->conexion=Conexion::conectar();

		$plantas=[];
		$sql="SELECT * FROM JILTON_PLANTAS WHERE idHotel=".$idHotel;
		$consulta=$this->conexion->query($sql);
		while($fila=$consulta->fetch_array()){
			$planta= new Planta($fila['idHotel'],
								$fila['numeroPlanta'],
								$fila['activa']
								);
			
				$plantas[]=$planta;
			
		}
		//var_dump($plantas);
		// $this->conexion=Conexion::desconectar();
		return $plantas;
		
	}

	public function generatePlantaDAO($idHotel,
								$numeroPlanta){

		$this->conexion=Conexion::conectar();

		
		
		$sql="INSERT INTO JILTON_PLANTAS (idHotel,
										numeroPlanta,
										activa)
										VALUES
										($idHotel,
										$numeroPlanta,
										1)";

		if($this->conexion->query($sql)){			
			return true;
		}else{
			return 0;
		}
				
		
	}

	} ?>