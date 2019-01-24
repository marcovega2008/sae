<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/CicloCapacitacionContinua.php');
class Controlador_ciclocapacitacioncontinua extends Controlador_Base
{
      function crear($args)
      {
         $ciclocapacitacioncontinua = new CicloCapacitacionContinua($args["id"],$args["descripcion"],$args["fechaInicio"],$args["fechaFin"]);
         $sql = "INSERT INTO CicloCapacitacionContinua (descripcion,fechaInicio,fechaFin) VALUES (?,?,?);";
         $fechaInicioNoSQLTime = strtotime($ciclocapacitacioncontinua->fechaInicio);
         $fechaInicioSQLTime = date("Y-m-d", $fechaInicioNoSQLTime);
         $ciclocapacitacioncontinua->fechaInicio = $fechaInicioSQLTime;
         $fechaFinNoSQLTime = strtotime($ciclocapacitacioncontinua->fechaFin);
         $fechaFinSQLTime = date("Y-m-d", $fechaFinNoSQLTime);
         $ciclocapacitacioncontinua->fechaFin = $fechaFinSQLTime;
         $parametros = array($ciclocapacitacioncontinua->descripcion,$ciclocapacitacioncontinua->fechaInicio,$ciclocapacitacioncontinua->fechaFin);
         $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
         if(is_null($respuesta[0])){
            return true;
         }else{
            return false;
         }
      }
   
      function actualizar($args)
      {
         $ciclocapacitacioncontinua = new CicloCapacitacionContinua($args["id"],$args["descripcion"],$args["fechaInicio"],$args["fechaFin"]);
         $fechaInicioNoSQLTime = strtotime($ciclocapacitacioncontinua->fechaInicio);
         $fechaInicioSQLTime = date("Y-m-d", $fechaInicioNoSQLTime);
         $ciclocapacitacioncontinua->fechaInicio = $fechaInicioSQLTime;
         $fechaFinNoSQLTime = strtotime($ciclocapacitacioncontinua->fechaFin);
         $fechaFinSQLTime = date("Y-m-d", $fechaFinNoSQLTime);
         $ciclocapacitacioncontinua->fechaFin = $fechaFinSQLTime;
         $parametros = array($ciclocapacitacioncontinua->descripcion,$ciclocapacitacioncontinua->fechaInicio,$ciclocapacitacioncontinua->fechaFin,$ciclocapacitacioncontinua->id);
         $sql = "UPDATE CicloCapacitacionContinua SET descripcion = ?,fechaInicio = ?,fechaFin = ? WHERE id = ?;";
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
      $sql = "DELETE FROM CicloCapacitacionContinua WHERE id = ?;";
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
         $sql = "SELECT * FROM CicloCapacitacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM CicloCapacitacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM CicloCapacitacionContinua LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM CicloCapacitacionContinua;";
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
            $sql = "SELECT * FROM CicloCapacitacionContinua WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM CicloCapacitacionContinua WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM CicloCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM CicloCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}