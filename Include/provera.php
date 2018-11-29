<?php
session_start();
if (!isset($_SESSION["korisnickoIme"]))
{
    header("Location: prijava.php");
}
?>