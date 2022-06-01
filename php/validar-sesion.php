<?php
session_start();
echo json_encode($_SESSION);
if (!isset($_SESSION["nombre"])) {
  $_SESSION["nombre"] = null;
  session_destroy();
  header('Location: http://localhost/index.php');
}
