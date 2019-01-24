<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/CursoCapacitacionContinua.php');
class Controlador_cursocapacitacioncontinua extends Controlador_Base
{
    function crear($args)
    {
       $cursocapacitacioncontinua = new CursoCapacitacionContinua($args["id"],$args["nombre"],$args["descripcion"]);
       $sql = "INSERT INTO CursoCapacitacionContinua (nombre,descripcion) VALUES (?,?);";
       $parametros = array($cursocapacitacioncontinua->nombre,$cursocapacitacioncontinua->descripcion);
       $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
       if(is_null($respuesta[0])){
          return true;
       }else{
          return false;
       }
    }
 
  
    function actualizar($args)
    {
       $cursocapacitacioncontinua = new CursoCapacitacionContinua($args["id"],$args["nombre"],$args["descripcion"]);
       $parametros = array($cursocapacitacioncontinua->nombre,$cursocapacitacioncontinua->descripcion,$cursocapacitacioncontinua->id);
       $sql = "UPDATE CursoCapacitacionContinua SET nombre = ?,descripcion = ? WHERE id = ?;";
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
      $sql = "DELETE FROM CursoCapacitacionContinua WHERE id = ?;";
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
         $sql = "SELECT * FROM CursoCapacitacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM CursoCapacitacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

    function leer_vigentes($args)
    {
        $id = $args["id"];
        if ($id==""){
            $sql = "SELECT * FROM CursoCapacitacionContinua where id = 3 or id = 5 or id = 6 or id = 1 or id = 11;";
        }else{
            $parametros = array($id);
            $sql = "SELECT * FROM CursoCapacitacionContinua WHERE id = ?;";
        }
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        return $respuesta;
    }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM CursoCapacitacionContinua LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM CursoCapacitacionContinua;";
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
            $sql = "SELECT * FROM CursoCapacitacionContinua WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM CursoCapacitacionContinua WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM CursoCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM CursoCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}