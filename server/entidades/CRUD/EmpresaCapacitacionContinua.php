<?php
class Empresacontinua
{
   public $id;
   public $ustedTrabaja;
   public $nombre;
   public $direccion;
   public $correo;
   public $telefono;
   public $actividad;
   public $cursoAuspiciado;
   public $contactoAuspicio;
   public $enteroCurso;
   public $otrosCursos;

   function __construct($id,$ustedTrabaja,$nombre,$direccion,$correo,$telefono,$actividad,$cursoAuspiciado,$contactoAuspicio,$enteroCurso,$otrosCursos){
      $this->id = $id;
      $this->ustedTrabaja = $ustedTrabaja;
      $this->nombre = $nombre;      
      $this->direccion = $direccion;
      $this->correo = $correo;
      $this->telefono = $telefono;
      $this->actividad = $actividad;
      $this->cursoAuspiciado = $cursoAuspiciado;  
      $this->contactoAuspicio = $contactoAuspicio;
      $this->enteroCurso = $enteroCurso;
      $this->otrosCursos = $otrosCursos;
 
   }
}
?>

  