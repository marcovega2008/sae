<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/MatriculaInglesCapacitacionContinua.php');
class Controlador_matriculainglescapacitacioncontinua extends Controlador_Base
{

   function crear($args)
   {
      $matriculainglescapacitacioncontinua = new MatriculaInglesCapacitacionContinua($args["id"],$args["idNivelCapacitacionContinua"],$args["idHorarioCapacitacionContinua"],$args["idInstruccionCapacitacionContinua"],$args["idCupoInglesCapacitacionContinua"],$args["idModalidad"],$args["idPersona"]);
      $sql = "INSERT INTO MatriculaInglesCapacitacionContinua (idNivelCapacitacionContinua,idHorarioCapacitacionContinua,idInstruccionCapacitacionContinua,idCupoInglesCapacitacionContinua,idModalidad,idPersona) VALUES (?,?,?,?,?,?);";
      $parametros = array($matriculainglescapacitacioncontinua->$idNivelCapacitacionContinua,$matriculainglescapacitacioncontinua->$idHorarioCapacitacionContinua,$matriculainglescapacitacioncontinua->$idInstruccionCapacitacionContinua,$matriculainglescapacitacioncontinua->$idCupoInglesCapacitacionContinua,$matriculainglescapacitacioncontinua->$idModalidad,$matriculainglescapacitacioncontinua->$idPersona);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar($args)
   {
      $matriculainglescapacitacioncontinua = new MatriculaInglesCapacitacionContinua($args["id"],$args["idNivelCapacitacionContinua"],$args["idHorarioCapacitacionContinua"],$args["idInstruccionCapacitacionContinua"],$args["idCupoInglesCapacitacionContinua"],$args["idModalidad"],$args["idPersona"]);
      $parametros = array($matriculainglescapacitacioncontinua->idNivelCapacitacionContinua,$matriculainglescapacitacioncontinua->idHorarioCapacitacionContinua,$matriculainglescapacitacioncontinua->idInstruccionCapacitacionContinua,$matriculainglescapacitacioncontinua->idCupoInglesCapacitacionContinua,$matriculainglescapacitacioncontinua->idModalidad,$matriculainglescapacitacioncontinua->idPersona,$matriculainglescapacitacioncontinua->id);
      $sql = "UPDATE MatriculaInglesCapacitacionContinua SET idNivelCapacitacionContinua = ?,idHorarioCapacitacionContinua = ?,idInstruccionCapacitacionContinua = ?,idCupoInglesCapacitacionContinua = ?,idModalidad = ?,idPersona = ? WHERE id = ?;";
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
      $sql = "DELETE FROM MatriculaInglesCapacitacionContinua WHERE id = ?;";
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
         $sql = "SELECT * FROM MatriculaInglesCapacitacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MatriculaInglesCapacitacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MatriculaInglesCapacitacionContinua LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MatriculaInglesCapacitacionContinua;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado($args)
   {
      $idCicloColumna = $args["columna"];
      $tipoFiltro = $args["tipo_filtro"];
      $filtro = $args["filtro"];
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MatriculaInglesCapacitacionContinua WHERE $idCicloColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MatriculaInglesCapacitacionContinua WHERE $idCicloColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MatriculaInglesCapacitacionContinua WHERE $idCicloColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MatriculaInglesCapacitacionContinua WHERE $idCicloColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}