<?php
class CursoCapacitacionContinua
{
   public $id;
   public $nombre;
   public $descripcion;
   

   function __construct($id,$nombre,$descripcion){
      $this->id = $id;
      $this->nombre = $nombre;
      $this->descripcion = $descripcion;
   }
}
?>