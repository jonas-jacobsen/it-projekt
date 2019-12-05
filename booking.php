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

$bootName = $row["bootname"];
$bootModell = $row["bootModell"];
$bildId = $row['bildId'];
$typ = $row['typ'];
$anzPersonen = $row['anzPersonen'];
$anzKajueten = $row['anzKajueten'];
$length = $row['length'];

/* Preis aufgrund von Haupt oder Nebensaison bestimmen*/
$aktuellerMonat = date("m");
if ($aktuellerMonat < 6 || $aktuellerMonat > 10) {
    $preis = $row["preisNS"];
} else {
    $preis = $row["preisNS"];
}
/*End Preisermittlung HS/NS*/

/*auswahl id der letzen Buchung*/
$sql2 = "SELECT MAX(id) AS id FROM Buchungen";
$result2 = mysqli_query($connect, $sql2);
$row2 = mysqli_fetch_array($result2);
$letzteBuchungsId = $row2['id'] + 1;
$buchungsNr = "$anzPersonenBuchung" . "3928" . $letzteBuchungsId;

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

/*Entscheidung über Glyphicon*/
if($row["typ"] == "Yacht" || $row["typ"] == "Windjammer" || $row["typ"] == "Mehrrumpfboot") {
    $glyph = "<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\">";
}else{
    $glyph = "<span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\">";
}
?>
<div class="jumbotron"
     style="background-image: url('assets/pics/yachthafen.jpg'); background-size: cover; height:300px">
    <div class="container">
        <h1>Buchen</h1>
        <p></p>
    </div>
</div>
<div class="container">
    <form class="needs-validation" action="confirmation.php" method="post">
        <div class="row">
            <div class="col-md-8">

                <div class="headerBooking">
                    <h3><?php echo $row['bootname']; ?></h3>
                    <p class="schiffsname"><?php echo $row['bootModell']; ?></p>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                        dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                        sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et
                        justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                        ipsum dolor sit amet.</p>

                    <div class="bilderAzeigen">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Positionsanzeiger -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Verpackung für die Elemente -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="<?php echo $bildId ?>" alt="...">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="<?php echo $bildId ?>" alt="...">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="<?php echo $bildId ?>" alt="...">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                            </div>

                            <!-- Schalter -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button"
                               data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Zurück</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button"
                               data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Weiter</span>
                            </a>
                        </div>
                    </div>

                    <div class="headerBooking1">
                        <h4>Folgende Extras und Leistungen sind im Preis enthalten</h4>
                        <div class="row">
                            <div class="col-xs-4">
                                <p><img src="assets/icons/gas-bottle.svg" width="15" height="20"> Gasflasche</p>
                            </div>
                            <div class="col-xs-4">
                                <p><?php echo $glyph ?></span></span>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <p><img src="assets/icons/pillow.svg" width="15" height="20"> Cockpitkissen</p>
                            </div>
                            <div class="col-xs-4">
                                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <p><img src="assets/icons/inflatable-boat.svg" width="15" height="20"> Beiboot</p>
                            </div>
                            <div class="col-xs-4">
                                <p><?php echo $glyph ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <p><img src="assets/icons/life-insurance.svg" width="15" height="20"> Yachtversicherung
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <p><img src="assets/icons/cleaning.svg" width="15" height="20"> Endreinigung</p>
                            </div>
                            <div class="col-xs-4">
                                <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="headerBooking2">
                        <h4>Folgende Extras können noch hinzugebucht werden</h4>
                        <small>Bitte schreibe deine gewünschten Extras in des "Besonderer Wünsche" Feld</small>
                        <br><br>
                        <div class="row">
                            <div class="col-xs-4">
                                <p>Handtücher</p>
                            </div>
                            <div class="col-xs-4">
                                <p>&euro; 17,00 / Person</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <p>Kaskoversicherung</p>
                            </div>
                            <div class="col-xs-4">
                                <p>&euro; 295,00 / Woche</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <p>Außenbordmotor</p>
                            </div>
                            <div class="col-xs-4">
                                <p>&euro; 145,00 / Woche</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <p>Skipper</p>
                            </div>
                            <div class="col-xs-4">
                                <p>&euro; 274,00 / Tag</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>

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
                                   placeholder="Bsp: 21335" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vorundnachname">Ort</label>
                            <input type="text" name="ort" class="form-control" id="exampleFormControlInput2"
                                   placeholder="Bsp: Lüneburg" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Besondere Wünsche</label>
                    <textarea class="form-control" name="anschreiben" id="exampleFormControlTextarea1"
                              rows="3"></textarea>
                </div>

                <hr>

                <h4>Bezahlung</h4>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bezahlart" id="exampleRadios1"
                           value="Kreditkarte"
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
                <input type="hidden" name="gesamtTage" value="<?php echo $gesamtTage ?>">
                <input type="hidden" name="preisHS" value="<?php echo $preis ?>">
                <input type="hidden" name="gesamtPreis" value="<?php echo $gesamtPreis ?>">
                <input type="hidden" name="anzKajueten" value="<?php echo $anzKajueten ?>">
                <input type="hidden" name="typ" value="<?php echo $typ ?>">
                <input type="hidden" name="bootname" value="<?php echo $row['bootname'] ?>">
            </div>
            <!--Auswahlbox rechte Seite -->
            <div class="sidebar">
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
                            <span>Gesamt</span>
                            <strong>&euro; <?php echo $gesamtPreis ?></strong>
                        </li>
                    </ul>
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck29" required="required">
                    <label class="form-check-label" for="invalidCheck29">Agree to terms and conditions*</label><br>
                    <button type="submit" name="submit" id="buttonID" class="btn btn-primary">Buchen</button><br>
                    <small>*Mit abschließen deiner Buchung und so weiter und so fort...</small>
                </div>
            </div>
        </div>
    </form>
    <!--Form validieren -->
</div>
<!--script zum anzeigen von Kredidkarten informationen oder Ueberweisung -->
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
