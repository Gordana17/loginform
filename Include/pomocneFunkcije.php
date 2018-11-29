<?php
function ZamijeniZnakoveZaNoviRed($ulaz)
{
    $izlaz = str_replace("\r\n", "<br />", $ulaz);
    $izlaz = str_replace("\n", "<br />", $izlaz);

    return $izlaz;
}
?>
