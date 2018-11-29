<?php
require("../Include/otvoriVezu.php");
require("../Include/provera.php");
require("../Include/zaglavlje.php");
?>
<a href="odjava.php"> Odjavi se </a>
<h2>Popis članaka</h2>
<table class="list" cellspacing="0">
    <tr>
        <th>Unešen</th>
        <th>Rubrika</th>
        <th>Naslov</th>
        <th>Objavljen</th>
        <th>Brisanje</th>
    </tr>
<?php
$veza = OtvoriVezu();
$rezultat = mysql_query("SELECT Clanak.id AS idClanka, naziv,
naslov, objavljen, UNIX_TIMESTAMP(datumUnosa) AS datum FROM Clanak, Rubrika WHERE rubrika.id = clanak.idRubrike ORDER BY datumUnosa DESC");
if (mysql_num_rows($rezultat) == 0)
{
    echo '<tr><td colspan="5" align="middle">Nema članaka</td></tr>';
}
while ($redak = mysql_fetch_array($rezultat))
{
    $id = $redak["idClanka"];
    $datum = $redak["datum"];
    $rubrika = $redak["naziv"];
    $naslov = stripSlashes($redak["naslov"]);
    if ($redak["objavljen"] == 1)
    {
        $objavljen = "Da";
    }
    else
    {
        $objavljen = "Ne";
    }
    echo "<tr>";
    echo "<td>" . date("j.n.Y.", $datum) . "</td>";
    echo "<td>$rubrika</td>";
    echo "<td><a href='prikazClanka.php?id=$id'>$naslov</a></td>";
    echo "<td>$objavljen</td>";
    echo "<td><a href='brisanjeClanka.php?id=$id'>Obriši članak</a></td>";
    echo "</tr>";
}
mysql_free_result($rezultat);
mysql_close($veza);
?>
</table>
<br />
<a href="unosClanka.php">Novi članak</a>
<?php
require("../Include/podnozje.php");
?>
