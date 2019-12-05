<?php
include("components/config.php");
include("components/header.php");
include("components/navbar.php");

/*error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');*/

$sql = "INSERT INTO `Buchungen` (`id`, `buchungsNr`, `bootsId`, `startDatum`, `endDatum`, `gesamtTage`,`anzPersBuchung`, `gesamtPreis`, `emailadresse`, `persName`, `ort`, `plz`, `strasse`, `anschreiben`, `bezahlart`) 
VALUES (NULL, '$_POST[buchungsNr]', '$_POST[id]', '$_POST[anfangsDatumDB]', '$_POST[endDatumDB]', '$_POST[gesamtTage]', '$_POST[anzPersonenBuchung]',  '$_POST[gesamtPreis]',  '$_POST[email]',  '$_POST[persName]', '$_POST[ort]', '$_POST[plz]', '$_POST[strasse]', '$_POST[anschreiben]', '$_POST[bezahlart]');";
$result = mysqli_query($connect, $sql);

$buchungsNr = $_POST['buchungsNr'];

$anfangsDatum = $_POST['anfangsDatum'];
$endDatum = $_POST['endDatum'];

$auswahlBoot = $_POST['id'];
$persName = $_POST['persName'];
$email = $_POST['email'];
$street = $_POST['strasse'];
$postleitzahl = $_POST['plz'];
$ort = $_POST['ort'];
$anfrage = $_POST['anschreiben'];
$bezahlart = $_POST['bezahlart'];

$anzPersonenBuchung = $_POST['anzPersonenBuchung'];
$gesamtTage = $_POST['gesamtTage'];
$gesamtPreis = $_POST['gesamtPreis'];
$preis = $_POST['preisHS'];
$anzKajueten = $_POST['anzKajueten'];
$typ = $_POST['typ'];
$bootname = $_POST['bootname'];

/*Mailversand der Buchung*/
if ($_POST['bezahlart'] == "Kreditkarte") {

} else {
    $ueberweisungstext = "Bitte überweise den oben genannten Betrag auf folgendes Konto:
XXL Baltic Yachting GmbH
DE05 2005 0110 0220 1555 55
    ";
};

$subject = "XXL Baltic Yachting Buchungsbestaetigung: " . $_POST["buchungsNr"];

$content = "Hallo " . $_POST["persName"] . ",

hiermit bestätigen wir deine Buchung mit der Buchungsnummer " . $_POST["buchungsNr"] . ".
Deine Buchung ist mit folgenden Daten bei uns eingegangen:

Name: " . $_POST["persName"] . "
E-Mail: " . $_POST["email"] . "
Straße und Hausnummer: " . $_POST["strasse"] . "
Postleitzahl: " . $_POST["plz"] . "
Deine Besonderen Wünsche: " . $_POST["anschreiben"] . "

Deine Infos zum gemieteten Boot:
Ausleihdatum: " . $_POST["anfangsDatum"] . " - " . $_POST["endDatum"] . "
Bootsname: " . $_POST["bootname"] . "
Anzahl der gebuchten Personen: " . $_POST["anzPersonenBuchung"] . "
Anzahl der Kajüten: " . $_POST["anzKajueten"] . "
Preis pro Tag: " . $_POST["preisHS"] . " €
Gesamtpreis: " . $_POST["gesamtPreis"] . " €

Du hast folgende Bezahlung ausgewählt: " . $_POST['bezahlart'] . "
".$ueberweisungstext."
 
Falls du deine Buchung stornieren moechtest, folge bitte den Link: https://come-prima.de/Projekte/it-projektmanagement/yourbooking.php?buchungsnummer=".$_POST['buchungsNr']."

Vielen Spaß auf deiner Reise wünscht dir das Team der XXL Baltic Yachting";
$headers .= "From: balticyachting@outlook.de";
$emailTo = $_POST["email"];

mail($emailTo, $subject, $content, $headers);
?>

<div class="jumbotron" style="background-image: url('assets/pics/yachthafen.jpg'); background-size: cover">
    <div class="container">
        <h1>Reservierungsbestätigung</h1>
        <p>Vielen Dank für deine Buchung (<?php echo $buchungsNr . ') von ';
            echo $bootname ?></p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4>Deine Daten</h4>
            <div class="form-group">
                <label for="vorundnachname">Vor- und Nachname</label>
                <p><?php echo $_POST['persName'] ?></p>
            </div>
            <div class="form-group">
                <label for="email">Emailadresse</label>
                <p><?php echo $_POST['email'] ?></p>
            </div>
            <div class="form-group">
                <label for="strasse">Straße und Hausnummer</label>
                <p><?php echo $_POST['strasse'] ?></p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strasse">Postleitzahl</label>
                        <p><?php echo $_POST['plz'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="vorundnachname">Ort</label>
                        <p><?php echo $_POST['ort'] ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Besondere Wünsche</label>
                <p><?php echo $_POST['anschreiben'] ?></p>
            </div>

            <hr>

            <h4>Bezahlung</h4>

            <div class="form-group">
                <p>Ausgewählt: <?php if ($_POST['bezahlart'] == "Kreditkarte") {
                        echo "Kreditkarte";
                    } else {
                        echo 'Überweisung<div class="ueberweisung">
                                <h4>Bitte überweisen auf folgendes Konto:</h4>
                                <p>XXL Baltic Yachting GmbH</p>
                                <p>DE05 2005 0110 0220 1555 55</p>
                              </div>
                ';
                    } ?></p>
            </div>

            <hr>
        </div>

        <!--Auswahlbox rechte Seite -->
        <div class="col-md-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Deine Auswahl</span>
                <span class="badge badge-secondary badge-pill"><?php echo $_POST['bootname'] ?></span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Ausleihdatum</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted"><?php echo $_POST['ausleihdatum'] ?>  </span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Anzahl der Tage</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted"><?php echo $gesamtTage ?> </span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Bootstyp</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted"><?php echo $typ ?> </span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Anzahl der Personen</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted"><?php if ($anzPersonenBuchung == "") {
                            echo "Keine Anzahl eingegeben";
                        } else {
                            echo $anzPersonenBuchung;
                        } ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Anzahl der Kajüten</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted"><?php echo $anzKajueten ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Preis pro Tag</h6>
                        <small class="text-muted">Die Preise variieren zu Saisonzeiten</small>
                    </div>
                    <span class="text-muted"><?php echo $preis ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Gesamt (EURO)</span>
                    <strong><?php echo $gesamtPreis ?>&euro;</strong>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
include("components/footer.php");
?>
