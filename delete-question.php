<?php

require 'core/class/escape.php';



if (isset($_GET['idQuestion'])) {
    Escape::deleteQuestion($_GET['idQuestion']);
 
}

if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: view-list.php');
}

?>