<?php
require("../Include/otvoriVezu.php");
require("../Include/provera.php");
?>
<nav class="navbar navbar-default navbar-inverse nav-holder" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="logo" src="../assets/images/images1.png"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="odjava.php"><b>Logout</b></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="prijava.php">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input  class="form-control" name="korisnickoIme">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input  type="password" class="form-control" name="lozinka">
                                            <!--                                            <div class="help-block text-right"><a href="">Forget the password ?</a></div>-->
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn-block" value="Login"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h2 class="text-center">Welcome!</h2>
<?php
require("../Include/podnozje.php");
?>
<br />
<a href="unosClanka.php">Novi članak</a>
<?php
require("../Include/zaglavlje.php");
require("../Include/podnozje.php");
?>
