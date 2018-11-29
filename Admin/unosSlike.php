<?php
require("../Include/otvoriVezu.php");
require("../Include/provera.php");

if (isset($_GET[" idClanka "]))
{
    $idClanka = addSlashes($_GET["idClanka"]);
    if (isset($_FILES["slika"]["tmp_name"]) &&
        $_FILES["slika"]["size"] != 0)
    {
        $putanja =
            "../Slike/{$idClanka}_{$_FILES["slika"]["name"]}";
        $sql = "INSERT INTO Slika (idClanka, putanja) ";
        $sql .= "VALUES ( $idClanka, '$putanja');";

        $veza = otvoriVezu();
        if (mysql_query($sql))
        {
            if (!move_uploaded_file($_FILES["slika"]["tmp_name"],
                $putanja))
            {
                exit("Spremanje slike na posluţitelj nije uspjelo.");
            }

            header("Location: prikazClanka.php?id=" . $idClanka );
        }
        else
        {
            mysql_close($veza);
            exit("Spremanje slike u bazu nije uspjelo.");
        }
        mysql_close($veza);
    }
}
require("../Include/zaglavlje.php");
?>
    <h2>Unos slike</h2>
    <form method="POST"
          action="unosSlike.php?idClanka=<?php echo $idClanka ?>"
          enctype="multipart/form-data" >
        <table>
            <tr>
                <td>Slika</td>
                <td><input type="file" name="slika"/></td>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Spremi"/>
                    <input type="button" value="Odustani"
                           onclick="javascript:void(location.href =
                               'prikazClanka.php?id=<?php echo $idClanka ?>')"/>
                </td>
            </tr>
        </table>
    </form>
<?php
require("../Include/podnozje.php");
?>