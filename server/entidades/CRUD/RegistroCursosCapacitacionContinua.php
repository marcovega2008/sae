<?php
class RegistroCursosCapacitacionContinua
{
   public $id;
   public $fecha;
   public $idInstituto;
   public $idCursoCapacitacionContinua;  
   public $idHorarioCapacitacionContinua;
   public $idCupoCapacitacionContinua;
   public $idfechaInicio;
   public $idfechaFin;
   
  
   function __construct($id,$fecha,$idInstituto,$idCursoCapacitacionContinua,$idHorarioCapacitacionContinua,$idCupoCapacitacionContinua,$idfechaInicio,$idfechaFin){
      $this->id = $id;     
      $this->fecha = $fecha;
      $this->idInstituto = $idInstituto;
      $this->idCursoCapacitacionContinua = $idCursoCapacitacionContinua;      
      $this->idHorarioCapacitacionContinua = $idHorarioCapacitacionContinua;    
      $this->idCupoCapacitacionContinua = $idCupoCapacitacionContinua;
      $this->idfechaInicio = $idfechaInicio;
      $this->idfechaFin = $idfechaFin;
   }
}
?>
