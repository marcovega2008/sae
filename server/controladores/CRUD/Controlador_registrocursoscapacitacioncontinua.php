<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/RegistroCursosCapacitacionContinua.php');
class Controlador_registrocursoscapacitacioncontinua extends Controlador_Base
{
   function crear($args)
   {
      $registrocursoscapacitacioncontinua = new RegistroCursosCapacitacionContinua($args["id"],$args["fecha"],$args["idInstituto"],$args["idCursoCapacitacionContinua"],$args["idHorarioCapacitacionContinua"],$args["idCupoCapacitacionContinua"],$args["fechaInicio"],$args["fechaFin"]);
      $sql = "INSERT INTO RegistroCursosCapacitacionContinua (fecha,idInstituto,idCursoCapacitacionContinua,idHorarioCapacitacionContinua,idCupoCapacitacionContinua,idfechaInicio,idFechaFin) VALUES (?,?,?,?,?,?,?);";
      $fechaNoSQLTime = strtotime($registrocursoscapacitacioncontinua->fecha);
      $fechaSQLTime = date("Y-m-d H:i:s", $fechaNoSQLTime);
      $registrocursoscapacitacioncontinua->fecha = $fechaSQLTime;
      $fechaInicioNoSQLTime = strtotime($registrocursoscapacitacioncontinua->fechaInicio);
      $fechaInicioSQLTime = date("Y-m-d H:i:s", $fechaInicioNoSQLTime);
      $registrocursoscapacitacioncontinua->fechaInicio = $fechaInicioSQLTime;
      $fechaFinNoSQLTime = strtotime($registrocursoscapacitacioncontinua->fechaFin);
      $fechaFinSQLTime = date("Y-m-d H:i:s", $fechaFinNoSQLTime);
      $registrocursoscapacitacioncontinua->fechaFin = $fechaFinSQLTime;
      $parametros = array($registrocursoscapacitacioncontinua->fecha,$registrocursoscapacitacioncontinua->idInstituto,$registrocursoscapacitacioncontinua->idCursoCapacitacionContinua,$registrocursoscapacitacioncontinua->idHorarioCapacitacionContinua,$registrocursoscapacitacioncontinua->idCupoCapacitacionContinua,$registrocursoscapacitacioncontinua->idfechaInicio,$registrocursoscapacitacioncontinua->idfechaFin);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar($args)
   {
      $registrocursoscapacitacioncontinua = new RegistroCursosCapacitacionContinua($args["id"],$args["fecha"],$args["idInstituto"],$args["idCursoCapacitacionContinua"],$args["idHorarioCapacitacionContinua"],$args["idCupoCapacitacionContinua"],$args["fechaInicio"],$args["fechaFin"]);
      $fechaNoSQLTime = strtotime($registrocursoscapacitacioncontinua->fecha);
      $fechaSQLTime = date("Y-m-d H:i:s", $fechaNoSQLTime);
      $registrocursoscapacitacioncontinua->fecha = $fechaSQLTime;
      $fechaInicioNoSQLTime = strtotime($registrocursoscapacitacioncontinua->fechaInicio);
      $fechaInicioSQLTime = date("Y-m-d H:i:s", $fechaInicioNoSQLTime);
      $registrocursoscapacitacioncontinua->fechaInicio = $fechaInicioSQLTime;
      $fechaFinNoSQLTime = strtotime($registrocursoscapacitacioncontinua->fechaFin);
      $fechaFinSQLTime = date("Y-m-d H:i:s", $fechaFinNoSQLTime);
      $registrocursoscapacitacioncontinua->fechaFin = $fechaFinSQLTime;
      $parametros = array($registrocursoscapacitacioncontinua->fecha,$registrocursoscapacitacioncontinua->idInstituto,$registrocursoscapacitacioncontinua->idCursoCapacitacionContinua,$registrocursoscapacitacioncontinua->idHorarioCapacitacionContinua,$registrocursoscapacitacioncontinua->idCupoCapacitacionContinua,$registrocursoscapacitacioncontinua->idfechaInicio,$registrocursoscapacitacioncontinua->idfechaFin);
      $sql = "UPDATE RegistroCursosCapacitacionContinua SET fecha = ?,idInstituto = ?,idCursoCapacitacionContinua = ?,idHorarioCapacitacionContinua = ?,idCupoCapacitacionContinua = ?,idfechaInicio = ?,idfechaFin = ? WHERE id = ?;";
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
      $sql = "DELETE FROM RegistroCursosCapacitacionContinua WHERE id = ?;";
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
         $sql = "SELECT * FROM RegistroCursosCapacitacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM RegistroCursosCapacitacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM RegistroCursosCapacitacionContinua LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM RegistroCursosCapacitacionContinua;";
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
            $sql = "SELECT * FROM RegistroCursosCapacitacionContinua WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM RegistroCursosCapacitacionContinua WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM RegistroCursosCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM RegistroCursosCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}
