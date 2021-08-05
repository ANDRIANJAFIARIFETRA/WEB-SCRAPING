<?php 

$config = parse_ini_file('../config/config.ini');
require '../config/constante.php';
require '../config/directory.php';
$dir = new FileDir();
require '../config/routes.php';
require '../config/database.php';
require '../config/connector.php';
require '../config/core.php';
require '../config/message.php';
$message = new Message();
require '../config/forms.php';
$database = $base;

    $Id = $_GET['id'];

    $site = $database->delete('site', 'code_site ='.$Id); 

    echo array_to_json($site);

?>