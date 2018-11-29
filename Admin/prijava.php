<?php
require("../Include/otvoriVezu.php");
session_start();
$poruka = "";
if (isset($_POST["korisnickoIme"]) && isset($_POST["lozinka"]))
{
    $korisnickoIme = addSlashes($_POST["korisnickoIme"]);
    $lozinka = addSlashes($_POST["lozinka"]);
    $veza = OtvoriVezu();
    $rezultat = mysql_query("SELECT * FROM korisnik WHERE korisnickoIme = '$korisnickoIme' AND lozinka = '$lozinka'");
    if(mysql_num_rows($rezultat) == 1)
    {
        $korisnik = mysql_fetch_array($rezultat);
        $_SESSION["korisnickoIme"] = $korisnickoIme;
        $_SESSION["idKorisnika"] = $korisnik["id"];
        header("Location: popisClanaka.php");
    }
    else
    {
        $poruka = "Neuspešna prijava";
    }
    mysql_free_result($rezultat);
    mysql_close($veza);
}
require("../Include/zaglavlje.php");
require ("../templates/loginForm.php");

?>