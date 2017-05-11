<?php 



//Modelo conexion
Class MasterModelDAO {
	protected $conexion;
	protected $elementos;
	protected $elementosPorPagina;
	protected $orderBy;
	protected $orderDirection;
	protected $tabla;


	public function __construct($tabla){

		$this->conexion=Conexion::conectar();
		$this->elementos=array();
		$this->elementosPorPagina=NEPP;
		
		$this->orderDirection='ASC';
		$this->tabla=$tabla;

		$sql="SELECT * FROM $tabla LIMIT 0,1";
		$consulta=$this->conexion->query($sql);
		//$this->orderBy=$consulta->fetch_fields[0]->name];

	}	

	public function elementosPorPagina($elementosPorPagina=NEPP){
		if($elementosPorPagina > 0){
			$this->elementosPorPagina=$elementosPorPagina;
		}
	}

	public function getPaginas(){

		$sql="SELECT * FROM $this->tabla";
		$consulta=$this->conexion->query($sql);
		
			return ceil ( $consulta->num_rows / $this->elementosPorPagina );
		

	}

	public function establecerOrden($campo,$orden){

		if($campo){
			$this->orderBy=$campo;
		}

		if($orden){
			$this->orderDirection=$orden;
		}

	}



}


 ?>