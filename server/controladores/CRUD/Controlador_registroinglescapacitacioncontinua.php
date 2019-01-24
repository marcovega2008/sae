<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/RegistroInglesCapacitacionContinua.php');
class Controlador_registroinglescapacitacioncontinua extends Controlador_Base
{
   function crear($args)
   {
      $registroinglescapacitacioncontinua = new RegistroInglesCapacitacionContinua($args["id"],$args["fecha"],$args["idPeriodoLectivo"],$args["idCicloCapacitacionContinua"],$args["idNivelCapacitacionContinua"],$args["idHorarioCapacitacionContinua"],$args["idCupoCapacitacionContinua"]);
      $sql = "INSERT INTO RegistroInglesCapacitacionContinua (fecha,idPeriodoLectivo,idCicloCapacitacionContinua,idNivelCapacitacionContinua,idHorarioCapacitacionContinua,idCupoCapacitacionContinua) VALUES (?,?,?,?,?,?);";
      $fechaNoSQLTime = strtotime($registroinglescapacitacioncontinua->fecha);
      $fechaSQLTime = date("Y-m-d H:i:s", $fechaNoSQLTime);
      $registroinglescapacitacioncontinua->fecha = $fechaSQLTime;
      $parametros = array($registroinglescapacitacioncontinua->fecha,$registroinglescapacitacioncontinua->idPeriodoLectivo,$registroinglescapacitacioncontinua->idCicloCapacitacionContinua,$registroinglescapacitacioncontinua->idNivelCapacitacionContinua,$registroinglescapacitacioncontinua->idHorarioCapacitacionContinua,$registroinglescapacitacioncontinua->idCupoCapacitacionContinua);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar($args)
   {
      $registroinglescapacitacioncontinua = new RegistroInglesCapacitacionContinua($args["id"],$args["fecha"],$args["idPeriodoLectivo"],$args["idCicloCapacitacionContinua"],$args["idNivelCapacitacionContinua"],$args["idHorarioCapacitacionContinua"],$args["idCupoCapacitacionContinua"]);
      $fechaNoSQLTime = strtotime($registroinglescapacitacioncontinua->fecha);
      $fechaSQLTime = date("Y-m-d H:i:s", $fechaNoSQLTime);
      $registroinglescapacitacioncontinua->fecha = $fechaSQLTime;
      $parametros = array($registroinglescapacitacioncontinua->fecha,$registroinglescapacitacioncontinua->idPeriodoLectivo,$registroinglescapacitacioncontinua->idCicloCapacitacionContinua,$registroinglescapacitacioncontinua->idNivelCapacitacionContinua,$registroinglescapacitacioncontinua->idHorarioCapacitacionContinua,$registroinglescapacitacioncontinua->idCupoCapacitacionContinua,$registroinglescapacitacioncontinua->id);
      $sql = "UPDATE RegistroInglesCapacitacionContinua SET fecha = ?,idPeriodoLectivo = ?,idCicloCapacitacionContinua = ?,idNivelCapacitacionContinua = ?,idHorarioCapacitacionContinua = ?,idCupoCapacitacionContinua = ? WHERE id = ?;";
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
      $sql = "DELETE FROM RegistroInglesCapacitacionContinua WHERE id = ?;";
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
         $sql = "SELECT * FROM RegistroInglesCapacitacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM RegistroInglesCapacitacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM RegistroInglesCapacitacionContinua LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM RegistroInglesCapacitacionContinua;";
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
            $sql = "SELECT * FROM RegistroInglesCapacitacionContinua WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM RegistroInglesCapacitacionContinua WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM RegistroInglesCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM RegistroInglesCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}