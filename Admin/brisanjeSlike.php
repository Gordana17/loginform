<?php
require("../Include/otvoriVezu.php");
require("../Include/provera.php");

if (isset($_GET["id"]))
{
    $id = addSlashes($_GET["id"]);
    $veza = OtvoriVezu();
    $rezultat = mysql_query("SELECT idClanka, putanja FROM lika WHERE id = $id");
    if($redak = mysql_fetch_array($rezultat))
    {
        $idClanka = $redak["idClanka"];
        $putanja = $redak["putanja"];
    }
    else
    {
        mysql_close($veza);
        exit("Slika nije pronađena u bazi.");
    }
    mysql_free_result($rezultat);

    if (mysql_query("DELETE FROM Slika WHERE id = $id"))
    {
        if (file_exists($putanja))
        {
            unlink($putanja);
        }
    }
    else
    {
        mysql_close($veza);
        exit("Brisanje slike nije uspjelo.");
    }

    mysql_close($veza);

    header("Location: prikazClanka.php?id=" . $idClanka );
}
?>