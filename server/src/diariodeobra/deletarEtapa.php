<?php

session_start();

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../database/pleng.db');
   }
}

$db = new MyDB();

$iddiarioetapa = $_POST['data'];
$diarioetapa = json_decode($iddiarioetapa, true);

if(!$db) {
    echo $db->lastErrorMsg();
} else {

    $result = $db->query("DELETE FROM etapadiario WHERE idetapadiario = '$diarioetapa'");

}

?>