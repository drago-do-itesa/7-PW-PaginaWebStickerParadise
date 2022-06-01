<?php
//singleton
class Usuarios
{
  private static $instancia;
  private $dbh;

  private function __construct()
  {
    try {
      $servidor = "localhost";
      $base = "paradise";
      $usuario = "root";
      $contrasenia = "";
      $this->dbh = new PDO('mysql:host=' . $servidor . ';dbname=' . $base, $usuario, $contrasenia);
      $this->dbh->exec("SET CHARACTER SET utf8");
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage();
      die();
    }
  }

  public static function singleton()
  {
    if (!isset(self::$instancia)) {
      $miclase = __CLASS__;
      self::$instancia = new $miclase;
    }
    return self::$instancia;
  }

  public function Consulta($correo)
  {
    try {
      $query = $this->dbh->prepare("SELECT * FROM usuarios WHERE correo LIKE ?");
      $query->bindParam(1, $correo);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function recuperarColeccionesStickers()
  {
    try {
      $query = $this->dbh->prepare("SELECT * FROM productos");
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function insertarStickers($nombre, $precio, $descripcion)
  {
    try {
      $query = $this->dbh->prepare("INSERT INTO productos VALUES (null, ?, ?, ?)");
      $query->bindParam(1, $nombre);
      $query->bindParam(2, $precio);
      $query->bindParam(3, $descripcion);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function eliminarStickers($id)
  {
    try {
      $query = $this->dbh->prepare("DELETE FROM productos WHERE id LIKE ?");
      $query->bindParam(1, $id);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function usuarioExiste($correo)
  {
    try {
      $query = $this->dbh->prepare("SELECT * FROM usuarios WHERE correo LIKE ?");
      $query->bindParam(1, $correo);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function crearUsuario($nombre, $correo, $contra)
  {
    try {
      $query = $this->dbh->prepare("INSERT INTO usuarios VALUES (null, ?, ?, ?,0)");
      $query->bindParam(1, $nombre);
      $query->bindParam(2, $correo);
      $query->bindParam(3, $contra);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function insertar($p1)
  {
    try {
      $query = $this->dbh->prepare("INSERT INTO tabla VALUES (?)");
      $query->bindParam(1, $p1);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function Borrar($p1)
  {
    try {
      $query = $this->dbh->prepare("DELETE FROM tabla WHERE campo LIKE ?");
      $query->bindParam(1, $p1);
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function Actualizar($p1, $p2)
  {
    try {
      $query = $this->dbh->prepare("UPDATE tabla SET campo1=? WHERE campo2 LIKE ?");
      $query->bindParam(1, $p1);
      $query->bindParam(2, $p2);
      $query->execute();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }



  public function __clone()
  {
    trigger_error('La clonación no es permitida!.', E_USER_ERROR);
  }
}
