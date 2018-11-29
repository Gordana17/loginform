<nav class="navbar navbar-default navbar-inverse" role="navigation">
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
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
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
             <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Register</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input  class="form-control" name="korisnickoIme">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input  type="password" class="form-control" name="lozinka">
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
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
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
?>
