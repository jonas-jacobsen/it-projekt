<?php
include("../components/config.php");
include("session.php");

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

$errormessage = "";

$sbf = "1";

//Boote zur Datenbank hinzufügen
if (isset($_POST['abschicken'])) {
    $sqlInsertBoat = "INSERT INTO `Boote`(`id`, `bootname`, `typ`, `bootModell`, `bootText`, `anzPersonen`, `anzKajueten`, `length`, `bildId`, `bild2`, `bild3`, `preisHS`, `preisNS`, `sbf`) VALUES (NULL ,'$_POST[bootsname]','$_POST[bootstyp]','$_POST[bootsmodell]','$_POST[beschreibung]','$_POST[maxPersonen]','$_POST[anzKajueten]','$_POST[laenge]','$_POST[bild1]','$_POST[bild2]','$_POST[bild3]','$_POST[preisHS]','$_POST[preisNS]','$_POST[sbf]')";
    $result1 = mysqli_query($connect, $sqlInsertBoat);
    $errormessage = "<div class=\"alert alert-success\" role=\"alert\">Das Boot wurde erfolgreich hinzugefügt</div>";
} else {

}

//alle Boote aus Db anzeigen lassen
function showBoats($connect)
{
    $sqlShowBoats = "Select * FROM Boote";
    $result = mysqli_query($connect, $sqlShowBoats);

    echo '      
      <div class="table-responsive">
             <table class="table"> 
                <thead>
                    <tr>
                      <th scope="col">BootId</th>
                      <th scope="col">Bootname</th>
                      <th scope="col">Boottyp</th>
                      <th scope="col">Bootmodell</th>
                      <th scope="col">Boottext</th>
                      <th scope="col">Anzahl max. Personen</th>
                      <th scope="col">Anzahl Kajüten</th>
                      <th scope="col">Bootslänge</th>
                      <th scope="col">Preis Hauptsaison</th>
                      <th scope="col">Preis Nebensaison</th>
                      <th scope="col">sbf benötigt</th>
                   
                    </tr>
                </thead>
                <tbody>';

    while ($row = mysqli_fetch_array($result)) {
        if ($row['sbf'] == 1) {
            $sbf = 'Ja';
        } else {
            $sbf = 'Nein';
        }

        echo ' 
                    <tr>
                      <td>' . $row['id'] . '</td>
                      <td>' . $row['bootname'] . '</td>
                      <td>' . $row['typ'] . '</td>
                      <td>' . $row['bootModell'] . '</td>
                      <td>' . $row['bootText'] . '</td>
                      <td>' . $row['anzPersonen'] . '</td>
                      <td>' . $row['anzKajueten'] . '</td>
                      <td>' . $row['length'] . ' m</td>
                      <td>' . $row['preisHS'] . '&euro;</td>
                      <td>' . $row['preisNS'] . '&euro;</td>
                      <td>' . $sbf . '</td>
                    </tr>';
    }
    echo '</tbody>
         </table>
         </div>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/myStyle.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/lightpick.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script src="../js/lightpick.js"></script>

    <link rel="icon" href="../assets/pics/favicon.ico">

    <title>Backend - XXL Baltic Yachting</title>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" id="navbartop">
    <div class="navcontainer">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Navigation ein-/ausblenden</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">XXL Baltic Yachting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="allbookings.php">Alle Buchungen ansehen</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h1>XXL Baltic Yachting</h1>
        <p>Boote hinzufügen</p>
    </div>
</div>
<div class="container">
    <?php echo $errormessage ?>
    <div class="addBoats">
        <!-- Button, der das Modal aufruft -->

        <h2>Neues Boot zur Datenbank hinzufügen</h2>
        <br>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#meinModal">
            Neues Boot hinzufügen
        </button>

        <div class="modal fade" id="meinModal" tabindex="-1" role="dialog" aria-labelledby="meinModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Schließen"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Boot hinzufügen</h4>
                    </div>
                    <div class="modal-body">

                        <form method="post">
                            <div class="form-group">
                                <label for="titel">Bootsname</label>
                                <input type="text" name="bootsname" class="form-control" id="titel" required="required">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="beispieltext">Bootstyp</label>
                                        <input name="bootstyp" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="beispieltext">Bootsmodell</label>
                                        <input name="bootsmodell" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="beispieltext">Anzahl max. Personen</label>
                                        <input name="maxPersonen" type="number" class="form-control"
                                               required="required">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="beispieltext">Anzahl Kajüeten</label>
                                        <input name="anzKajueten" type="number" class="form-control"
                                               required="required">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="beispieltext">Sportbootführerschein?</label><br>
                                        <select class="form-control" name="sbf" id="sbf">
                                            <option value="1">Ja</option>
                                            <option value="0">Nein</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="beispieltext">Länge der Bootes</label>
                                        <input name="laenge" type="number" step="0.1" class="form-control"
                                               required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="beispieltext">Bild Link 1</label>
                                        <input name="bild1" type="url" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="beispieltext">Bild Link 2</label>
                                        <input name="bild2" type="url" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="beispieltext">Bild Link 3</label>
                                        <input name="bild3" type="url" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="beispieltext">Preis Hauptsaison / Tag</label>
                                        <input name="preisHS" type="number" step="0.1" class="form-control"
                                               required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="beispieltext">Preis Nebensaison / Tag</label>
                                        <input name="preisNS" type="number" step="0.1" class="form-control"
                                               required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="anliegen">Bootsbeschreibung</label>
                                <textarea class="form-control" name="beschreibung" id="content" rows="5"></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                        <button type="submit" value="send" name="abschicken" class="btn btn-primary">Hinzufügen</button>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    <div class="allBoats">
        <?php showBoats($connect); ?>
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

