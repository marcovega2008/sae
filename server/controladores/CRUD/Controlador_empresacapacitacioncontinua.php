<?php
include_once('../controladores/Controlador_Base.php');
include_once('../entidades/CRUD/EmpresaCapacitacionContinua.php');
class Controlador_empresacapacitacioncontinua extends Controlador_Base
{
   function crear($args)
   {
      $empresacapacitacioncontinua = new EmpresaCapacitacionContinua($args["id"],$args["ustedTrabaja"],$args["nombre"],$args["direccion"],$args["correo"],$args["telefono"],$args["actividad"],$args["cursoAuspiciado"],$args["contactoAuspicio"],$args["enteroCurso"],$args["otrosCursos"]);
      $sql = "INSERT INTO EmpresaCapacitacionContinua (ustedTrabaja,nombre,direccion,correo,telefono,actividad,cursoAuspiciado,contactoAuspicio,enteroCurso,otrosCursos) VALUES (?,?,?,?,?,?,?,?,?,?);";
      $parametros = array($empresacapacitacioncontinua->id,$empresacapacitacioncontinua->ustedTrabaja,$empresacapacitacioncontinua->nombre,$empresacapacitacioncontinua->direccion,$empresacapacitacioncontinua->correo,$empresacapacitacioncontinua->telefono,$empresacapacitacioncontinua->actividad,$empresacapacitacioncontinua->cursoAuspiciado,$empresacapacitacioncontinua->contactoAuspicio,$empresacapacitacioncontinua->enteroCurso,$empresacapacitacioncontinua->otrosCursos);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar($args)
   {
      $empresacapacitacioncontinua = new EmpresaCapacitacionContinua($args["id"],$args["ustedTrabaja"],$args["nombre"],$args["direccion"],$args["correo"],$args["telefono"],$args["actividad"],$args["cursoAuspiciado"],$args["contactoAuspicio"],$args["enteroCurso"],$args["otrosCursos"]);
      $parametros = array($empresacapacitacioncontinua->ustedTrabaja,$empresacapacitacioncontinua->nombre,$empresacapacitacioncontinua->direccion,$empresacapacitacioncontinua->correo,$empresacapacitacioncontinua->telefono,$empresacapacitacioncontinua->actividad,$empresacapacitacioncontinua->cursoAuspiciado,$empresacapacitacioncontinua->contactoAuspicio,$empresacapacitacioncontinua->enteroCurso,$empresacapacitacioncontinua->otrosCursos,$empresacapacitacioncontinua->id);
      $sql = "UPDATE EmpresaCapacitacionContinua SET ustedTrabaja = ?,nombre = ?,direccion = ?,correo = ?,telefono = ?,actividad = ?,cursoAuspiciado = ?,contactoAuspicio = ?,enteroCurso = ?,otrosCursos = ? WHERE id = ?;";
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
      $sql = "DELETE FROM EmpresaCapacitacionContinua WHERE id = ?;";
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
         $sql = "SELECT * FROM EmpresaCapacitacionContinua;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EmpresaCapacitacionContinua WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($args)
   {
      $pagina = $args["pagina"];
      $registrosPorPagina = $args["registros_por_pagina"];
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EmpresaCapacitacionContinua LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($args)
   {
      $registrosPorPagina = $args["registros_por_pagina"];
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM EmpresaCapacitacionContinua;";
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
            $sql = "SELECT * FROM EmpresaCapacitacionContinua WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EmpresaCapacitacionContinua WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EmpresaCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EmpresaCapacitacionContinua WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}