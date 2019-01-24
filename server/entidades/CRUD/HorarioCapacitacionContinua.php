<?php
class HorarioCapacitacionContinua
{
   public $id;
   public $tiempoInicio;
   public $tiempoFin;
  
   function __construct($id,$tiempoInicio,$tiempoFin){
      $this->id = $id;
      $this->tiempoInicio = $tiempoInicio;
      $this->tiempoFin = $tiempoFin;
   }
}
?>