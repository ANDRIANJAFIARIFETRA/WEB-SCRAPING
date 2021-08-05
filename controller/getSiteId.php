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

    $site = $database->select('site', '*', 'code_site = '.$Id);
    $allSite = array();

    //--------EXtraction des liens -----
    $page = file_get_contents($site[0]['url_site']);
    $htmlDom = new DOMDocument;
    @$htmlDom->loadHTML($page);
    $links = $htmlDom->getElementsByTagName('a');
    $extractedLinks = array();
    foreach($links as $link){
        $linkText = $link->nodeValue;
        $linkHref = $link->getAttribute('href');

        if(strlen(trim($linkHref)) == 0){
            continue;
        }

        if($linkHref[0] == '#'){
            continue;
        }

        if (strpos($linkHref, 'http') !== false) {
            $extractedLinks[] = $linkHref;
        }

    }

    //----------------

    $data = array(
        "mere" => $site[0],
        "fils" => $extractedLinks
    );
    echo array_to_json($data);

?>
