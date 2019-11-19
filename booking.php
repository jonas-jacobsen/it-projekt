<?php
include("components/config.php");
include("components/header.php");
include("components/navbar.php");

/*error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');*/

$auswahlBoot = $_GET['id'];
$anzPersonenBuchung = $_GET['anzPersonenBuchung'];
$ausleihDatum = $_GET['ausleihdatum'];

$sql = "SELECT * FROM Boote WHERE id = '$auswahlBoot'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

$bildId = $row['bildId'];
$typ = $row['typ'];
$anzPersonen = $row['anzPersonen'];
$anzKajueten = $row['anzKajueten'];
$length = $row['length'];
$preis = $row['preisHS'];

/*auswahl id der letzen Buchung*/
$sql2 = "SELECT MAX(id) AS id FROM Buchungen";
$result2 = mysqli_query($connect, $sql2);
$row2 = mysqli_fetch_array($result2);
$letzteBuchungsId = $row2['id'] + 1;
$buchungsNr = "$anzPersonenBuchung" . "#3928#" . $letzteBuchungsId;

/*String Kalenderdatum von bis umwandeln in zwei Strings um Tage auszurechnen */
list($anfangsDatum, $endDatum) = explode("-", $ausleihDatum);

/*Umrechnung des Datums in Tage*/
function seDay($begin, $end, $format, $sep)
{

    $pos1 = strpos($format, 'd');
    $pos2 = strpos($format, 'm');
    $pos3 = strpos($format, 'Y');

    $begin = explode($sep, $begin);
    $end = explode($sep, $end);

    $first = GregorianToJD($end[$pos2], $end[$pos1], $end[$pos3]);
    $second = GregorianToJD($begin[$pos2], $begin[$pos1], $begin[$pos3]);

    if ($first > $second)
        return $first - $second;
    else
        return $second - $first;

}

$gesamtTage = seDay($anfangsDatum, $endDatum, "dmY", ".") + 1;
$gesamtPreis = $gesamtTage * $preis;

$anfangsDatumDB = $anfangsDatum;
$endDatumDB = $endDatum;

?>

<div class="jumbotron" style="background-image: url('assets/pics/yachthafen.jpg'); background-size: cover">
    <div class="container">
        <h1><?php echo $row['bootname'];?></h1>
        <p></p>
    </div>
</div>
<div class="container">
    <form class="needs-validation" action="confirmation.php" method="post" novalidate>
        <div class="row">
            <div class="col-md-8">
                <h4>Deine Daten</h4>
                <div class="form-group">
                    <label for="validationCustom01">Vor- und Nachname</label>
                    <input type="text" name="persName" class="form-control" id="validationCustom01"
                           placeholder="Bsp: max.mustermann@outlook.de" required>
                </div>
                <div class="form-group">
                    <label for="email">Emailadresse</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="Bsp: Max Mustermann" id="validationCustom02" required>
                </div>
                <div class="form-group">
                    <label for="strasse">Straße und Hausnummer</label>
                    <input type="text" name="strasse" class="form-control"
                           placeholder="Bsp: Feldstraße" id="validationCustom03" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="strasse">Postleitzahl</label>
                            <input type="number" name="plz" class="form-control" id="exampleFormControlInput1"
                                   placeholder="Bsp: 21335">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vorundnachname">Ort</label>
                            <input type="text" name="ort" class="form-control" id="exampleFormControlInput1"
                                   placeholder="Bsp: Lüneburg">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Besondere Wünsche</label>
                    <textarea class="form-control" name="anschreiben" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <hr>

                <h4>Bezahlung</h4>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bezahlart" id="exampleRadios1" value="Kreditkarte"
                           checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Kreditkarte
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bezahlart" id="exampleRadios2"
                           value="Überweisung">
                    <label class="form-check-label" for="exampleRadios2">
                        Überweisung
                    </label>
                </div>

                <div class="ueberweisung">
                    <h4>Bitte überweisen auf folgendes Konto:</h4>
                    <p>XXL Baltic Yachting GmbH</p>
                    <p>DE05 2005 0110 0220 1555 55</p>
                    <small>(Wird auf der Rechnung später noch einmal angezeigt)</small>
                </div>

                <div class="credit">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name auf der Karte</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="">
                            <small class="text-muted">Voller Name der auf der Karte steht</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Kreditkartennummmer</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Gültig bis</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="">
                        </div>
                    </div>
                </div>
                <hr>
                <input type="hidden" name="id" value="<?php echo $auswahlBoot ?>">
                <input type="hidden" name="buchungsNr" value="<?php echo $buchungsNr ?>">
                <input type="hidden" name="anzPersonenBuchung" value="<?php echo $anzPersonenBuchung ?>">
                <input type="hidden" name="anfangsDatum" value="<?php echo $anfangsDatum ?>">
                <input type="hidden" name="endDatum" value="<?php echo $endDatum ?>">
                <input type="hidden" name="anfangsDatumDB" value="<?php echo $anfangsDatumDB ?>">
                <input type="hidden" name="endDatumDB" value="<?php echo $endDatumDB ?>">
                <input type="hidden" name="gesamtTage" value="<?php echo $gesamtTage ?>">
                <input type="hidden" name="gesamtPreis" value="<?php echo $gesamtPreis ?>">
                <input type="hidden" name="anzPersonenBuchung" value="<?php echo $anzPersonenBuchung ?>">
                <input type="hidden" name="ausleihdatum" value="<?php echo $ausleihDatum ?>">
                <input type="hidden" name="gesamtTage" value="<?php echo $gesamtTage?>">
                <input type="hidden" name="preisHS" value="<?php echo $preis?>">
                <input type="hidden" name="gesamtPreis" value="<?php echo $gesamtPreis?>">
                <input type="hidden" name="anzKajueten" value="<?php echo $anzKajueten?>">
                <input type="hidden" name="typ" value="<?php echo $typ?>">
                <input type="hidden" name="bootname" value="<?php echo $row['bootname']?>">
            </div>

            <!--Auswahlbox rechte Seite -->
            <div class="col-md-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Deine Auswahl</span>
                    <span class="badge badge-secondary badge-pill"><?php echo $row['bootname'] ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Ausleihdatum</h6>
                            <small class="text-muted"></small>
                        </div>
                        <span class="text-muted"><?php echo $ausleihDatum ?> </span>
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
                <button type="submit" name="submit" id="buttonID" class="btn btn-primary">Buchen</button>
                <p>*Mit abschließen deiner Buchung und so weiter und so fort...</p>
            </div>
        </div>
    </form>

    <!--Form validieren -->
    <hr>
</div>
<script>
    $(document).ready(function () {
        $('input[type="radio"]').click(function () {
            if ($(this).attr("value") == "Überweisung") {
                $(".ueberweisung").show('slow');
                $(".credit").hide('slow');
            }
            else if ($(this).attr("value") == "Kreditkarte") {
                $(".ueberweisung").hide('slow');
                $(".credit").show('slow');
            }
        });
        $('input[type="radio"]').trigger('click');  // trigger the event
    });
</script>


<?php
include("components/footer.php");
?>

<!--script zum anzeigen von Kredidkarten informationen oder Ueberweisung -->

