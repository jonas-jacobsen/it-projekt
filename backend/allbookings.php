<?php
include("../components/config.php");
include("session.php");


//Alle Buchungen anzeigen lassen
function showAllBookings($connect){

    $sql = "SELECT * From Buchungen";
    $result = mysqli_query($connect, $sql);

    echo '      
      <div class="table-responsive">
             <table class="table"> 
                <thead>
                    <tr>
                      <th scope="col">Buchungsnummer</th>
                      <th scope="col">Boots ID</th>
                      <th scope="col">Ausleihdatum Anfang</th>
                      <th scope="col">Ausleihdatum Ende</th>
                      <th scope="col">Gesammttage</th>
                      <th scope="col">Anzahl Personen</th>
                      <th scope="col">Gesamtpreis</th>
                      <th scope="col">Name</th>
                      <th scope="col">Emailadresse</th>
                      <th scope="col">Straße</th>
                      <th scope="col">Plz</th>
                      <th scope="col">Ort</th>
                      <th scope="col">Anschreiben</th>
                      <th scope="col">Bezahlart</th>
                    </tr>
                </thead>
                <tbody>';

    while($row = mysqli_fetch_array($result)){

        echo' 
                    <tr>
                      <td>'.$row['buchungsNr'].'</td>
                      <td>'.$row['bootsId'].'</td>
                      <td>'.$row['startDatum'].'</td>
                      <td>'.$row['endDatum'].'</td>
                      <td>'.$row['gesamtTage'].'</td>
                      <td>'.$row['anzPersBuchung'].'</td>
                      <td>'.$row['gesamtPreis'].'&euro;</td>
                      <td>'.$row['persName'].'</td>
                      <td>'.$row['emailadresse'].'</td>
                      <td>'.$row['strasse'].'</td>
                      <td>'.$row['plz'].'</td>
                      <td>'.$row['ort'].'</td>
                      <td>'.$row['anschreiben'].'</td>
                      <td>'.$row['bezahlart'].'</td>
                    </tr>';
    }

    echo '</tbody>
         </table>
         </div>';

};

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
                <li><a href="backend.php">Neues Boot hinzufügen</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h1>XXL Baltic Yachting</h1>
        <p>Alle Buchungen einsehen</p>
    </div>
</div>
<div class="container">

    <h2>Alle Buchungen</h2>
    <?php showAllBookings($connect);?>
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
                        <p>Ihr habt gute Erfahrungen mit uns gemacht? Dann kommt uns doch auch bei <a href="#" target="_blank">Facebook</a> besuchen und klickt auf "gef&auml;llt mir".</p>
                        <ul class="icons">
                            <li><a href="#"
                                   class="icon fa-facebook" target="_blank"><span class="label"><img class="opacity" src="../assets/icons/face.svg" height="50em" alt="face"></span></a>
                                <a href="#"
                                   class="icon in-instagram" target="_blank"><span class="label"><img class="opacity" src="../assets/icons/insta.svg" height="50em" alt="insta"></span></a>
                                <a href="#" class="icon go-google"
                                   target="_blank"><span class="label"><img class="opacity" src="../assets/icons/google.svg" height="50em" alt="google"></span></a>
                            </li>
                        </ul>
                    </div>
                </section>
                <!-- Copyright -->
                <div class="copyright">
                    <ul class="menu">
                        <li>&copy; XXL Baltic Yachting GmbH - <?php  $jahr = date("Y", time()); echo $jahr ?>. All rights reserved. |</li>
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

