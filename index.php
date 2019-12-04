<!DOCTYPE html>
<html>
<?php
session_start();

include("components/config.php");
include("components/session.php");


/*Suchfeld*/
if (isset($_POST['ortDerAusleihe'])) {
    header('Location: results.php');
}
?>

<head>
    <title>XXL Baltic Yachting</title>

    <link rel="stylesheet" type="text/css" href="css/myStyle.css" media="screen"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <link rel="icon" href="assets/pics/favicon.ico">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <style>html {
            background: url('assets/pics/indexpic.jpg');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
        }
        h3, p {
            color: #fff;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-fixed-top" id="navbartopIndex">
    <div class="navcontainer">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Navigation ein-/ausblenden</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">XXL Baltic Yachting</a>
        </div>

      <!--  <div id="navbar" class="navbar-collapse collapse"> -->
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" >
                <li><a href="yourbooking.php">Deine Buchung</a></li>
                <li><a href="about.php">Erfahre mehr</a></li>
                <li><a href="tel:+499123456789"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></a></li>
                <li><a href="about.php#kontaktformular"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<div class="register">
    <h2>Was für ein Segelboot suchst du?</h2>
    <p>Einfach den gewünschten Typ auswählen und wir finden das passende Boot für dich</p>

    <form action="results.php" method="get" class="form-inline">
        <div class="form-group">
            <div class="form-group">
                <select name="typ" class="form-control" id="exampleFormControlSelect1">
                    <option>Alle anzeigen</option>
                    <option>Yacht</option>
                    <option>Jolle</option>
                    <option>Windjammer</option>
                    <option>Daysailer</option>
                    <option>Mehrrumpfboot</option>
                    <option>Beiboot</option>
                </select>
            </div>
        </div>
        <button type="submit" id="submitOne" class="btn btn-primary">   <i class="glyphicon glyphicon-search"></i>   </button>
    </form>
</div>
<?php
include("components/footerIndex.php");
?>
