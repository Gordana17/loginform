<?php
 function OtvoriVezu()
    {
    $veza = mysql_connect("localhost", "root", "");
    if ($veza)
    {
    if (mysql_select_db("cms", $veza))
    {
    return $veza;
    }
    else
    {
    exit("Baza s tim imenom ne postoji!");
    }
    }
    else
    {
    exit("Ne mogu se spojiti na MySql server!");
    }
    }
?>