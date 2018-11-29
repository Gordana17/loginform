<html>
<head>
    <title>App</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
    <link rel="stylesheet" type="text/css" href="../Izgled/izgled.css" />
    <!-- Latest compiled and minified CSS -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if (isset($_SESSION["korisnickoIme"]))
{
    echo "Prijavljen korisnik: <b>" . $_SESSION["korisnickoIme"] .
        "</b>";
}
else
{
//    echo '<a href="../Admin/prijava.php">Prijavi se</a>';
}
//?>
