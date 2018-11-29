<?php
require("../Include/otvoriVezu.php");
require("../Include/provera.php");

if (isset($_GET["id"]))
{
    $id = addSlashes($_GET["id"]);
    $veza = OtvoriVezu();

    // najprije obriši sve slike vezane za članak
    $rezultat = mysql_query("SELECT * FROM Slika WHERE idClanka = $id");
    while ($redak = mysql_fetch_array($rezultat))
    {
        $putanja = $redak["putanja"];
        if (file_exists("../$putanja"))
        {
            unlink("../$putanja");
        }
    }
    mysql_free_result($rezultat);
    if (!mysql_query("DELETE FROM Slika WHERE idClanka = $id"))
    {
        mysql_close($veza);
        exit("Brisanje slika nije uspelo.");
    }

    //zatim obriši članak
    if (!mysql_query("DELETE FROM Clanak WHERE id = $id"))
    {
        mysql_close($veza);
        exit("Brisanje članka nije uspelo.");
    }

    mysql_close($veza);
}
header("Location: popisClanaka.php");
?>