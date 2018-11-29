<?php
require("../Include/otvoriVezu.php");
require("../Include/provera.php");

if (isset($_POST["rubrika"]) && isset($_POST["naslov"]) &&
    isset($_POST["uvod"]) && isset($_POST["tekst"]))
{
    $rubrika = addSlashes($_POST["rubrika"]);
    $naslov = addSlashes($_POST["naslov"]);
    $uvod = addSlashes($_POST["uvod"]);
    $tekst = addSlashes($_POST["tekst"]);
    if (isset($_POST["objavljen"]))
    {
        $objavljen = 1;
    }
    else
    {
        $objavljen = 0;
    }
    if (isset($_POST["id"]))
    {
        // izmjena članka
        $id = addSlashes($_POST['id']);
        $sql = "UPDATE Clanak SET idRubrike = $rubrika, naslov = '$naslov', uvod = '$uvod', tekst = '$tekst', objavljen = $objavljen WHERE id = $id";
    }
    else
    {
        // unos novog članka
        $sql = "INSERT INTO Clanak (idRubrike, idAutora, naslov, uvod, tekst, objavljen) VALUES ( $rubrika, {$_SESSION['idKorisnika']}, '$naslov', '$uvod', '$tekst', '$objavljen')";
    }

    $veza = otvoriVezu();
    if (mysql_query($sql))
    {
        header("Location: popisClanaka.php");
    }
    else
    {
        mysql_close($veza);
        exit("Unos / izmena članka nije uspela.");
    }
    mysql_close($veza);
}
if (isset($_GET["id"]))
{
    // prikaz podataka za postojeći članak
    $id = addSlashes($_GET['id']);
    $veza = OtvoriVezu();
    $rezultat = mysql_query("SELECT * FROM clanak WHERE id = $id");
    if($redak = mysql_fetch_array($rezultat))
    {
        $naslovStranice = "Izmena članka";
        $linkZaPovratak = "prikazClanka.php?id=$id";
        $idRubrike = $redak["idRubrike"];
        $naslov = stripSlashes($redak["naslov"]);
        $uvod = stripSlashes($redak["uvod"]);
        $tekst = stripSlashes($redak["tekst"]);
        if ($redak["objavljen"] == 1)
        {
            $objavljen = "checked";
        }
        else
        {
            $objavljen = "";
        }
    }
    mysql_free_result($rezultat);
    mysql_close($veza);
}
else if (!isset($_POST["id"]))
{
    // novi članak
    $naslovStranice = "Unos članka";
    $linkZaPovratak = "popisClanaka.php";
    $idRubrike = 0;
    $naslov = "";
    $uvod = "";
    $tekst = "";
    $objavljen = "checked";
}
require("../Include/zaglavlje.php");
?>
<a href="odjava.php"> Odjavi se </a>
<h2><?php echo $naslovStranice ?></h2>
<form method="POST" action="unosClanka.php">
    <?php
    if (isset($id))
    {
        echo "<input type='hidden' name='id' value='$id'>";
    }
    ?>
    <table>
        <tr>
            <td>Rubrika</td>
            <td>
                <select name="rubrika">
                    <?php
                    $veza = OtvoriVezu();
                    $rezultat = mysql_query("SELECT * FROM rubrika ORDER BY redosledPrikaza");
                    while ($redak = mysql_fetch_array($rezultat))
                    {
                        $id = $redak["id"];
                        $naziv = $redak["naziv"];
                        echo '<option value="' . $id . '"';
                        if ($id == $idRubrike)
                        {
                            echo " selected";
                        }
                        echo ">$naziv</option>";
                    }
                    mysql_free_result($rezultat);
                    mysql_close($veza);
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Naslov</td>
            <td><input type="text" name="naslov" maxlength="100" size="66" value="<?php echo $naslov ?>"></td>
        </tr>
        <tr>
            <td>Uvod</td>
            <td>
 <textarea name="uvod" rows="5" cols="50">
 <?php echo $uvod ?>
 </textarea>
            </td>
        </tr>
        <tr>
            <td>Tekst</td>
            <td>
 <textarea name="tekst" rows="11" cols="50">
 <?php echo $tekst ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Objavljen</td>
            <td>
                <input type="checkbox" name="objavljen" <?php echo  $objavljen ?>/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Spremi"/>
                <input type="button" value="Odustani"  onclick="javascript:void(location.href = '<?php echo $linkZaPovratak ?>')"/>
            </td>
        </tr>
    </table>
</form>
<?php
require("../Include/podnozje.php");
?>