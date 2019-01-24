<?php
class CicloCapacitacionContinua
{
   public $id;
   public $descripcion;
   public $fechaInicio;
   public $fechaFin;

   function __construct($id,$descripcion,$fechaInicio,$fechaFin){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->fechaInicio = $fechaInicio;
      $this->fechaFin = $fechaFin;
   }
}
?>