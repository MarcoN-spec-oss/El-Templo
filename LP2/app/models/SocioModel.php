<?php
require_once __DIR__."/../../config/database.php";
class SocioModel{
    private $cn;
    public function __construct(){
        $db = new Database();
        $this->cn = $db->conectar();
    }

    public function listar(){
        $sql = "SELECT * FROM socios ORDER BY idSocio DESC";
        return $this->cn->query($sql)->fetchAll();
    }

    public function guardar($datos){
        $usuarioPortal = !empty($datos["usuario"]) ? $datos["usuario"] : $datos["dni"];
        $passwordPortal = !empty($datos["password"]) ? $datos["password"] : $datos["dni"];
        $passwordHash = password_hash($passwordPortal, PASSWORD_DEFAULT);
        $sql = "INSERT INTO socios
        (dni,nombres,apellidos,telefono,direccion,estado,idUsuario_admin,usuario,password)
        VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->cn->prepare($sql);
        return $stmt->execute([

            $datos["dni"],
            $datos["nombres"],
            $datos["apellidos"],
            $datos["telefono"],
            $datos["direccion"],
            "Activo",
            $_SESSION["idUsuario"],
            $usuarioPortal,
            $passwordHash
        ]);
    }

    public function buscarPorUsuario($usuario)
    {
        $sql = "SELECT * FROM socios WHERE usuario = ?";
        $stmt = $this->cn->prepare($sql);
        $stmt->execute([$usuario]);
        return $stmt->fetch();
    }

    public function obtener($id)
    {
        $sql = "SELECT * FROM socios WHERE idSocio=?";
        $stmt = $this->cn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function actualizar($datos)
    {
        // Si el administrador escribe una nueva contraseña, se actualiza y
        // se re-encripta. Si la deja en blanco, se conserva la actual.
        if (!empty($datos["password"])) {

            $sql = "UPDATE socios
                    SET
                    dni=?,
                    nombres=?,
                    apellidos=?,
                    telefono=?,
                    direccion=?,
                    estado=?,
                    usuario=?,
                    password=?
                    WHERE idSocio=?";

            $stmt = $this->cn->prepare($sql);
            return $stmt->execute([

                $datos["dni"],
                $datos["nombres"],
                $datos["apellidos"],
                $datos["telefono"],
                $datos["direccion"],
                $datos["estado"],
                $datos["usuario"],
                password_hash($datos["password"], PASSWORD_DEFAULT),
                $datos["idSocio"]

            ]);
        }

        $sql = "UPDATE socios
                SET
                dni=?,
                nombres=?,
                apellidos=?,
                telefono=?,
                direccion=?,
                estado=?,
                usuario=?
                WHERE idSocio=?";

        $stmt = $this->cn->prepare($sql);
        return $stmt->execute([

            $datos["dni"],
            $datos["nombres"],
            $datos["apellidos"],
            $datos["telefono"],
            $datos["direccion"],
            $datos["estado"],
            $datos["usuario"],
            $datos["idSocio"]

        ]);
    }

    public function eliminar($id)
    {
        $sql="DELETE FROM socios WHERE idSocio=?";
        $stmt=$this->cn->prepare($sql);
        return $stmt->execute([$id]);
    }

}