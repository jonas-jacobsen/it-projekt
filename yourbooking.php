<?php
include("components/config.php");
include("components/header.php");
include("components/navbar.php");

/*Buchungsnummer aus confirmation.php abfragen*/
$buchungsnummer = $_GET['buchungsnummer'];

?>

    <div class="jumbotron" style="background-image: url('assets/pics/yachthafen.jpg'); background-size: cover">
        <div class="container">
            <h1>Deine Buchung</h1>
            <p>Du kannst hier deine Buchung einsehen.</p>
        </div>
    </div>

    <div class="container" id="searchbar">
        <div class="row">
            <div class="col-md-6">
                <h2>Buchungsnummer in das Suchfeld eingeben</h2>
                <form action="#" method="get">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" name="buchungsnummer" class="form-control input-lg"
                                   placeholder="<?php if ($buchungsnummer == "") {
                                       echo 'Zum Beispiel: #1103871648';
                                   } else {
                                       echo $buchungsnummer;
                                   } ?>"/>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-info btn-lg">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php if ($buchungsnummer == "") {

} else {
    /*Buchungsdaten aus Buchungen DB laden*/
    $sql = "SELECT * FROM Buchungen WHERE buchungsNr = '$buchungsnummer'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);

    /*bootsdaten aus Boote DB laden*/
    $sql2 = "SELECT * FROM Boote WHERE id = '$row[bootsId]'";
    $result2 = mysqli_query($connect, $sql2);
    $row2 = mysqli_fetch_array($result2);

    /*Überweisungsinfos anzeigen, falls überweisung gewählt wurde*/
    if($row['bezahlart'] == "ueberweisung"){
        $uberweisungsText = " <h4>Bitte überweisen auf folgendes Konto:</h4><p>XXL Baltic Yachting GmbH</p><p>DE05 2005 0110 0220 1555 55</p>";
    }else{ $uberweisungsText = "";}

    if (mysqli_num_rows($result) != 0) {
        echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Deine Daten</h4>
                    <div class="form-group">
                        <label for="vorundnachname">Name</label>
                        <p>' . $row['persName'] . '</p>
                    </div>
                    <div class="form-group">
                        <label for="strasse">Straße und Hausnummer</label>
                        <p>' . $row['strasse'] . '</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="strasse">Postleitzahl</label>
                                <p>' . $row['plz'] . '</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vorundnachname">Ort</label>
                                <p>' . $row['ort'] . '</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deine besonderen Wünsche</label>
                        <p>' . $row['anschreiben'] . '</p>
                    </div>
    
                    <hr>
    
                    <h4>Bezahlung</h4>
                    <div class="form-group">
                    <label for="exampleFormControlTextarea1">Du hast folgende Bezahlung gewählt:</label>
                        <p> ' . $row['bezahlart'] . '</p>
                        <p>'.$uberweisungsText.'</p>
                    </div>
    
                    <hr>
                </div>
                <div class="col-md-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Deine Buchungsübersicht</span>
                        <span class="badge badge-secondary badge-pill">' . $row2['bootname'] . '</span>
                    </h4>
                   <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Ausleihdatum</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted"> ' . $row['startDatum'] . ' - ' . $row['endDatum'] . '</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Anzahl der Tage</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">' . $row['gesamtTage'] . '</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Bootstyp</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">' . $row2['typ'] . '</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Anzahl der gebuchten Personen</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">' . $row['anzPersBuchung'] . '</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Anzahl der Kajüten</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">' . $row2['anzKajueten'] . '</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Preis pro Tag</h6>
                                <small class="text-muted">Die Preise variieren zu Saisonzeiten</small>
                            </div>
                            <span class="text-muted">' . $row2['preisHS'] . '</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Gesamt (EURO)</span>
                            <strong>' . $row['gesamtPreis'] . '&euro;</strong>
                        </li>
                    </ul>
                    <button type="submit" id="buttonID" class="btn btn-danger">Stornieren</button><br><br>
                    <p>*Mit klick auf diesen Button stornierst du deine Buchung. Bitte denke daran, dass du deine Buchung bis spätestens eine Woche vorher stornieren kannst</p>
                </div>
            </div>
            <hr>    
        </div>';
    } else {
        echo "<div class='container' style='text-align: center'><h3>Leider ergab deine Suche mit der Buchungsnummer <big>".$buchungsnummer ."</big> keine Ergebnisse</h3></div>";
    };
    } ?>

    <?php
    include("components/footer.php");
    ?>