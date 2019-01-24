<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/CupoInglesCapacitacionContinua.php');
class Controlador_cupoinglescapacitacioncontinua extends Controlador_Base
{
   function crear($args)
   {
      $cupoinglescapacitacioncontinua = new CupoInglesCapacitacionContinua($args["id"],$args["maximocupos"],$args["cuposusados"]);
      $sql = "INSERT INTO CupoInglesCapacitacionContinua (maximocupos,cuposusados) VALUES (?,?);";
      $parametros = array($cupoinglescapacitacioncontinua->maximocupos,$cupoinglescapacitacioncontinua->cuposusados);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar($args)
   {
      $cupoinglescapacitacioncontinua = new CupoInglesCapacitacionContinua($args["id"],$args["maximocupos"],$args["cuposusados"]);
      $parametros = array($cupoinglescapacitacioncontinua->maximocupos,$cupoinglescapacitacioncontinua->cuposusados,$cupoinglescapacitacioncontinua->id);
      $sql = "UPDATE CupoInglesCapacitacionContinua SET maximocupos = ?,cuposusados = ? WHERE id = ?;";
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
      $sql = "DELETE FROM CupoInglesCapacitacionContinua WHERE id = ?;";
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
         $sql = "SELECT * FROM CupoInglesCapacitacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM CupoInglesCapacitacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM CupoInglesCapacitacionContinua LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM CupoInglesCapacitacionContinua;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado($args)
   {
      $nombreColumna = $args["columna"];
      $tipoFiltro = $args["tipo_filtro"];
      $filtro = $args["filtro"];
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM CupoInglesCapacitacionContinua WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM CupoInglesCapacitacionContinua WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM CupoInglesCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM CupoInglesCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}