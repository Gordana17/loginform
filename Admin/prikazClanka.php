<?php
require("../Include/otvoriVezu.php");
require("../Include/pomocneFunkcije.php");
require("../Include/provera.php");
if (isset($_GET["id"]))
{
    // prikaz podataka za članak
    $id = addSlashes($_GET['id']);
    $veza = OtvoriVezu();
    $rezultat = mysql_query("SELECT naslov, uvod, tekst, objavljen, UNIX_TIMESTAMP(datumUnosa) AS datum FROM clanak WHERE id = $id");
    if($redak = mysql_fetch_array($rezultat))
    {
        $naslov = stripSlashes($redak["naslov"]);
        $uvod = stripSlashes($redak["uvod"]);
        $tekst = stripSlashes($redak["tekst"]);
        if ($redak["objavljen"] == 1)
        {
            $objavljen = "Da";
        }
        else
        {
            $objavljen = "Ne";
        }
        $datum = $redak["datum"];
    }
    mysql_free_result($rezultat);
    mysql_close($veza);
}
?>
<h2>Prikaz članka</h2>
<table>
    <tr>
        <td><b>Naslov</b></td>
        <td><?php echo $naslov ?></td>
    </tr>
    <tr>
        <td><b>Uvod</b></td>
        <td><?php echo ZamijeniZnakoveZaNoviRed($uvod) ?></td>
    </tr>
    <tr>
        <td><b>Tekst</b></td>
        <td><?php echo ZamijeniZnakoveZaNoviRed($tekst) ?></td>
    </tr>
    <tr>
        <td><b>Objavljen</b></td>
        <td><?php echo $objavljen ?></td>
    </tr>
    <tr>
        <td><b>Datum unosa</b></td>
        <td><?php echo date('j.n.Y. H:i', $datum) ?></td>
    </tr>
</table>
<br />
<a href="unosClanka.php?id=<?php echo $id?>">Izmjena
    članka</a> |
<a href="popisClanaka.php">Povratak</a>

<h2>Slike uz članak</h2>
<table class="list" cellspacing="0">
    <tr>
        <th>Slika</th>
        <th>Putanja</th>
        <th>Brisanje</th>
    </tr>
    <?php
    $veza = OtvoriVezu();
    $rezultat = mysql_query("SELECT * FROM Slika WHERE idClanka = $id");
    if (mysql_num_rows($rezultat) == 0)
    {
        echo '<tr><td colspan="3" align="middle">Nema slika uz članak</td></tr>';
    }
    while ($redak = mysql_fetch_array($rezultat))
    {
        $idSlike = $redak["id"];
        $putanja = $redak["putanja"];

        echo "<tr>";
        echo "<td><img src='$putanja' height='50px' width='50px'/></td>";
        echo "<td>$putanja</td>";
        echo "<td><a href='brisanjeSlike.php?id=$idSlike'>Obriši sliku</a></td>";
        echo "</tr>";
    }
    mysql_free_result($rezultat);
    mysql_close($veza);
    ?>
</table>
<br/>
<a href="unosSlike.php?idClanka=<?php echo $id ?>">Dodaj novu
    sliku</a>
<br/><br/>
<?php
require("../Include/podnozje.php");
?>
