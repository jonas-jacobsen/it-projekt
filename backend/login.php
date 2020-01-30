<?php
session_start();

include('../components/config.php');
$errorMessage = "";

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

//Abfrage ob Nutzer in der Datenbank vorhanden ist

if (isset($_POST['send'])) {

    $sql = "SELECT * FROM User WHERE name = '$_POST[username]'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) != null) {
        if ($_POST['password'] == $row['pass']) {
            $_SESSION ['user_id'] = $row['name'];
            header('Location: backend.php');
        } else {
            $errorMessage = "<div class=\"alert alert-danger\" role=\"alert\">Passwort nicht korrekt</div>";
        }
    } else {
        $errorMessage = "<div class=\"alert alert-danger\" role=\"alert\">User nicht vorhanden</div>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/myStyle.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/backend.css" media="screen"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <link rel="icon" href="../assets/pics/favicon.ico">

    <title>Login - XXL Baltic Yachting</title>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" id="navbartop">
    <div class="navcontainer">
        <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">XXL Baltic Yachting</a>
        </div>
    </div>
</nav>
<div class="container">

    <div class="login-form">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="" autocomplete="off" method="post">
                                <?php echo $errorMessage ?>
                                <h2>Login</h2>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                           required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Passwort"
                                           required="required">
                                </div>
                                <button type="submit" name="send" id="sendlogin" class="btn btn-primary">login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container">
        <div class="titelschrift">
            <a style="text-decoration: none; color: #FFFFFF" href="index.php">XXL Baltic Yachting</a>
        </div>
        <hr/>
        <div class="row">
            <div class="12u">
                <section class="contact">
                    <div class="texte">
                        <header>
                            <h3>Findet uns auch auf Facebook</h3>
                        </header>
                        <p>Ihr habt gute Erfahrungen mit uns gemacht? Dann kommt uns doch auch bei <a href="#"
                                                                                                      target="_blank">Facebook</a>
                            besuchen und klickt auf "gef&auml;llt mir".</p>
                        <ul class="icons">
                            <li><a href="#"
                                   class="icon fa-facebook" target="_blank"><span class="label"><img class="opacity"
                                                                                                     src="../assets/icons/face.svg"
                                                                                                     height="50em"
                                                                                                     alt="face"></span></a>
                                <a href="#"
                                   class="icon in-instagram" target="_blank"><span class="label"><img class="opacity"
                                                                                                      src="../assets/icons/insta.svg"
                                                                                                      height="50em"
                                                                                                      alt="insta"></span></a>
                                <a href="#" class="icon go-google"
                                   target="_blank"><span class="label"><img class="opacity"
                                                                            src="../assets/icons/google.svg"
                                                                            height="50em" alt="google"></span></a>
                            </li>
                        </ul>
                    </div>
                </section>
                <!-- Copyright -->
                <div class="copyright">
                    <ul class="menu">
                        <li>&copy; XXL Baltic Yachting GmbH - <?php $jahr = date("Y", time());
                            echo $jahr ?>. All rights reserved. |
                        </li>
                        <li><a href="impressum.php">Impressum |</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>

