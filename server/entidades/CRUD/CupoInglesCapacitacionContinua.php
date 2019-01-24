<?php
class CupoInglesCapacitacionContinua
{
   public $id;
   public $maximocupos;
   public $cuposusados;

   function __construct($id,$maximocupos,$cuposusados){
      $this->id = $id;
      $this->maximocupos = $maximocupos;
      $this->cuposusados = $cuposusados;
   }
}
?>