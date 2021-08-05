<?php session_start();
// au dessus sessions start sur un header pour le repeter sur toute les pages
// en dessous on cree un session destroy lorsqu'on rentre ?destroy dans l'url de n'importe quel page de notre site pour simplifier ma vie 
if (isset($_GET['destroy'])){
    session_destroy();
} 
?>