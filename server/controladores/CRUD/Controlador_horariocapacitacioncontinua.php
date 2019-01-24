<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/HorarioCapacitacionContinua.php');
class Controlador_horariocapacitacioncontinua extends Controlador_Base
{

      function crear($args)
      {
         $horariocapacitacioncontinua = new HorarioCapacitacionContinua($args["id"],$args["tiempoInicio"],$args["tiempoFin"]);
         $sql = "INSERT INTO HorarioCapacitacionContinua (tiempoInicio,tiempoFin) VALUES (?,?);";
         $parametros = array($horariocapacitacioncontinua->tiempoInicio,$horariocapacitacioncontinua->tiempoFin);
         $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
         if(is_null($respuesta[0])){
            return true;
         }else{
            return false;
         }
      }
           
    function actualizar($args)
    {
       $horariocapacitacioncontinua = new HorarioCapacitacionContinua($args["id"],$args["tiempoInicio"],$args["tiempoFin"]);
       $parametros = array($horariocapacitacioncontinua->tiempoInicio,$horariocapacitacioncontinua->tiempoFin,$horariocapacitacioncontinua->id);
       $sql = "UPDATE HorarioCapacitacionContinua SET tiempoInicio = ?,tiempoFin = ? WHERE id = ?;";
       $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
       if(is_null($respuesta[0])){
          return true;
       }else{
          return false;
       }
    }

   function borrar($args)
   {
      $id = $args["id"];
      $parametros = array($id);
      $sql = "DELETE FROM  HorarioCapacitacionContinua WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($args)
   {
      $id = $args["id"];
      if ($id==""){
         $sql = "SELECT * FROM HorarioCapacitacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM HorarioCapacitacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM  HorarioCapacitacionContinua LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM  HorarioCapacitacionContinua;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado($args)
   {
      $tiempoInicioColumna = $args["columna"];
      $tipoFiltro = $args["tipo_filtro"];
      $filtro = $args["filtro"];
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM  HorarioCapacitacionContinua WHERE $tiempoInicioColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM  HorarioCapacitacionContinua WHERE $tiempoInicioColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM  HorarioCapacitacionContinua WHERE $tiempoInicioColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM  HorarioCapacitacionContinua WHERE $tiempoInicioColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}