<?php
class RegistroInglesCapacitacionContinua
{
   public $id;
   public $fecha;
   public $idPeriodoLectivo;
   public $idCicloCapacitacionContinua;
   public $idNivelCapacitacionContinua;
   public $idHorarioCapacitacionContinua;
   public $idCupoCapacitacionContinua;
  
   function __construct($id,$fecha,$idPeriodoLectivo,$idCicloCapacitacionContinua,$idNivelCapacitacionContinua,$idHorarioCapacitacionContinua,$idCupoCapacitacionContinua){
      $this->id = $id;     
      $this->fecha = $fecha;
      $this->idPeriodoLectivo = $idPeriodoLectivo;
      $this->idCicloCapacitacionContinua = $idCicloCapacitacionContinua;
      $this->idNivelCapacitacionContinua = $idNivelCapacitacionContinua;
      $this->idHorarioCapacitacionContinua = $idHorarioCapacitacionContinua;
      $this->idCupoCapacitacionContinua = $idCupoCapacitacionContinua;      
   }
}
?>