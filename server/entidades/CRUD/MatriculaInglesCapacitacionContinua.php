<?php
class MatriculaInglesCapacitacionContinua
{
   public $id;
   public $idNivelCapacitacionContinua;
   public $idHorarioCapacitacionContinua;
   public $idInstruccionCapacitacionContinua;
   public $idCupoInglesCapacitacionContinua;
   public $idModalidad;
   public $idPersona;

    function __construct($id,$idNivelCapacitacionContinua,$idHorarioCapacitacionContinua,$idInstruccionCapacitacionContinua,$idCupoInglesCapacitacionContinua,$idModalidad,$idPersona){
      $this->id = $id;
      $this->idNivelCapacitacionContinua = $idNivelCapacitacionContinua;
      $this->idHorarioCapacitacionContinua = $idHorarioCapacitacionContinua;
      $this->idInstruccionCapacitacionContinua = $idInstruccionCapacitacionContinua;
      $this->idCupoInglesCapacitacionContinua = $idCupoInglesCapacitacionContinua;
      $this->idModalidad = $idModalidad;
      $this->idPersona = $idPersona;
   }
}
?>

    
