<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mlogin extends Model
{
    public function getUserByUserName($userName){
      return $this->db->query("SELECT * FROM usuario WHERE usuario = '$userName'")->getResult();
    }
    private function getPaginas(){
      return $this->db->query("SELECT UP.id AS idPagina, UP.nombre AS nombrePagina, UP.idPagina AS subPagina, UPP.id AS idPermisoPagina, UPP.nombre AS nombrePermiso
        FROM UPagina UP LEFT JOIN UPermisoPagina UPP ON UPP.idPagina = UP.id
        WHERE UP.estatus = 1 ORDER BY UP.idPagina DESC, UP.orden
      ");
    }

    public function getEmpleados(){
      return $this->db->query("SELECT * FROM empleado;");
    }

    public function getArbolPaginas(){
      $paginas = $this->getPaginas()->getResult();

      $resPaginas = [];
      $permisos = [];
      foreach ($paginas as $key => $pagina) {

        $pagina->idPermisoPagina&&$permisos[$pagina->idPagina][$pagina->idPermisoPagina] = [
          "idPermisoPagina" => $pagina->idPermisoPagina,
          "nombrePermiso" => $pagina->nombrePermiso,
        ];

        $resPaginas[$pagina->idPagina] = [
          "idPagina" => $pagina->idPagina,
          "subPagina" => $pagina->subPagina,
          "nombrePagina" => $pagina->nombrePagina,
          "permisos" => isset($permisos[$pagina->idPagina]) ? array_values($permisos[$pagina->idPagina]) : [],
        ];

      }

      return array_values($resPaginas);

    }

    public function validarUsuario($usuario, $contraseña){
      $usuario = $this->db->query("SELECT * FROM empleado WHERE usuario = ? AND contraseña = ?", [$usuario, $contraseña])->getRow();
      if (isset($usuario->usuario)) {
        return ["estatus" => 1, "mensaje" => "información correcta", "data" => $usuario];
      }
      return ["estatus" => 0, "mensaje" => "El suuario o contraseña son incorrectos", "data" => []];
    }

}
