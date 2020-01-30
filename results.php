<?php

/*error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');*/

include("components/config.php");
include("components/header.php");
include("components/navbar.php");


//Filter
$typ = $_GET['typ'];
$anzPersonenBuchung = $_GET['anzPersonen'];
$anzKajueten = $_GET['anzKajueten'];
$ausleihDatum = $_GET['reservation'];


$yachen = "Die wesentliche Eigenschaft einer Yacht im Vergleich zu Jollen und Daysailern ist ihr komfortabler Wohnbereich. Im Grunde sind alle Yachten Fahrtenschiffe. Je nachdem, wo Dein Törn aber hingehen soll, sind mache davon besser und andere schlechter geeignet. Das beginnt bei der Größe der Yacht. Sie sollte im Verhältnis zu der Wellenlänge und Wellenhöhe in dem Revier, das Du besegeln willst, gewählt werden. Aber auch die Rumpfform spielt eine wesentliche Rolle: Langkieler, Kurzkieler, Flügelkieler oder Kimmkieler? Hubkieler sind vor allem in Revieren mit niedrigen Wassertiefen von Vorteil.";
$jollen = "Hier geht es um Geschwindigkeit, Spaß und Sport. Für jeden Sportler findet sich das richtige Sportgerät. Ob nun alleine, mit einem, zwei oder drei Mitseglern, die große Vielfalt der unterschiedlichen Jollen-Typen lässt keine Wünsche offen.";
$windjammer = "Der Traum von der großen Freiheit. Fernweh. Seeromantik.Über viele Jahrhunderte wurden diese Eigenschaften mit den Großseglern in Verbindung gebracht. Und das obwohl die Seeleute zu der Windjammer großen Zeit oftmals alles andere als Romantik empfunden haben dürften.";
$daysailer = "Der Begriff Daysailer wird oftmals für Yachten mit einer Länge unter 30 Fuß (9,10 Meter) verwendet. Der Name leitet sich aber eher von der Funktionalität ab. Es handelt sich um Segelschiffe, die sich sehr gut für einen Tages- oder Wochenendausflug eignen.";
$mehrrumpfboote = "Wer kennt Sie nicht, die spektakulären Bilder von Multihulls beim Brechen neuer Geschwindigkeitsrekorde. Nicht zuletzt durch die spektakulären Impressionen des America‘s Cup vor San Francisco boomt das Multihull Segeln.";
$beiboote = "Wie kommt man vom Ankerplatz an Land? In der Kreditkartenwerbung schwimmt die Seglerin das kurze Stück. Wer's weniger nass mag, fährt mit dem Beiboot.";


?>
<div id="wrapper"> <!-- start Wrapper -->
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li>
                <form action="" method="get" class="form-horizontal">
                    <div class="form-group">
                        <label for="anzPersonen"><span class="glyphSearchBar"><img src="assets/icons/boat.svg" width="22" height="15"></span>Segelbootstyp</label>
                        <div class="col-sm-10">
                            <select name="typ" class="form-control" id="typ">
                                <option><?php echo $typ ?></option>
                                <?php if ($typ != "Alle anzeigen") {
                                    echo '<option>Alle anzeigen</option>';
                                } ?>
                                <?php if ($typ != "Yacht") {
                                    echo '<option>Yacht</option>';
                                } ?>
                                <?php if ($typ != "Jolle") {
                                    echo '<option>Jolle</option>';
                                } ?>
                                <?php if ($typ != "Windjammer") {
                                    echo '<option>Windjammer</option>';
                                } ?>
                                <?php if ($typ != "Daysailer") {
                                    echo '<option>Daysailer</option>';
                                } ?>
                                <?php if ($typ != "Mehrrumpfboot") {
                                    echo '<option>Mehrrumpfboot</option>';
                                } ?>
                                <?php if ($typ != "Beiboot") {
                                    echo '<option>Beiboot</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="anzPersonen"><span class="glyphSearchBar"><img src="assets/icons/multiple-users-silhouette.svg" width="22" height="15"></span>Anzahl der Personen</label>
                        <div class="col-sm-10">
                            <select name="anzPersonen" class="form-control" id="anzPersonen">
                                <option><?php if ($anzPersonenBuchung == null) {
                                        echo null;
                                    } else {
                                        echo $anzPersonenBuchung;
                                    } ?></option>
                                <?php if ($anzPersonenBuchung != 2) {
                                    echo '<option>2</option>';
                                } ?>
                                <?php if ($anzPersonenBuchung != 3) {
                                    echo '<option>3</option>';
                                } ?>
                                <?php if ($anzPersonenBuchung != 4) {
                                    echo '<option>4</option>';
                                } ?>
                                <?php if ($anzPersonenBuchung != 5) {
                                    echo '<option>5</option>';
                                } ?>
                                <?php if ($anzPersonenBuchung != 6) {
                                    echo '<option>6</option>';
                                } ?>
                                <?php if ($anzPersonenBuchung != 7) {
                                    echo '<option>7</option>';
                                } ?>
                                <?php if ($anzPersonenBuchung != 8) {
                                    echo '<option>8</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="anzPersonen"><span class="glyphSearchBar"><img src="assets/icons/bed.svg" width="22" height="15"></span>Anzahl der Kajüten</label>
                        <div class="col-sm-10">
                            <select name="anzKajueten" class="form-control" id="anzKajueten">
                                <option><?php echo $anzKajueten ?></option>
                                <?php if ($anzKajueten != 0) {
                                    echo '<option>0</option>';
                                } ?>
                                <?php if ($anzKajueten != 1) {
                                    echo '<option>1</option>';
                                } ?>
                                <?php if ($anzKajueten != 2) {
                                    echo '<option>2</option>';
                                } ?>
                                <?php if ($anzKajueten != 3) {
                                    echo '<option>3</option>';
                                } ?>
                                <?php if ($anzKajueten != 4) {
                                    echo '<option>4</option>';
                                } ?>
                                <?php if ($anzKajueten != 5) {
                                    echo '<option>5</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="anzPersonen"><span class="glyphSearchBar"><img src="assets/icons/calendar.svg" width="22" height="15"></span>Datum auswählen</label>
                        <div class="col-sm-10">
                            <input type="text" class="datepicker" name="reservation" id="datepicker"
                                   value="<?php echo $ausleihDatum ?>"/>
                        </div>
                    </div>
                    <button type="submit" id="submitOne" class="btn btn-primary">Filter anwenden</button>
                </form>
            </li>
        </ul>
    </div>

    <div id="page-content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <a href="#menu-toggle" class="btn btn-default btn fixed-top" id="menu-toggle">Filter</a>
            </div>
        </div>
        <h3><?php echo $typ ?></h3>
        <p><?php
            switch ($typ) {
                case "Yacht":
                    echo $yachen;
                    break;
                case "Jolle":
                    echo $jollen;
                    break;
                case "Windjammer":
                    echo $windjammer;
                    break;
                case "Daysailer":
                    echo $daysailer;
                    break;
                case "Mehrrumpfboot":
                    echo $mehrrumpfboote;
                    break;
                case "Beiboot":
                    echo $beiboote;
                    break;
            }
            ?>
        </p>
        <h1 class="page-header">Deine Suchergebnisse</h1>
        <p id="result-2"></p>

        <?php

        /*String Kalenderdatum von bis umwandeln in zwei Strings um Tage auszurechnen */
        list($anfangsDatum, $endDatum) = explode("-", $ausleihDatum);
        /*Datum in Timestamp umwandeln um später abzugleichen ob das Boot schon gebucht wurde*/
        $tspmUserAnfangsDatum = strtotime($anfangsDatum);
        $tspmUserEndDatum = strtotime($endDatum);

        /*SQL-Anfrage bei auswahl des Filters*/
        if ($typ == "Alle anzeigen" && $anzPersonenBuchung == "" && $anzKajueten == "") {
            $sql = "SELECT * FROM Boote ORDER BY typ";
        } elseif ($typ != "Alle anzeigen" && $anzPersonenBuchung == "" && $anzKajueten == "") {
            $sql = "SELECT * FROM Boote WHERE typ = '$typ'";
        } elseif ($typ != "Alle anzeigen" && $anzPersonenBuchung != "" && $anzKajueten == "") {
            $sql = "SELECT * FROM Boote WHERE typ = '$typ' AND anzPersonen >= '$anzPersonenBuchung'";
        } elseif ($typ != "Alle anzeigen" && $anzPersonenBuchung != "" && $anzKajueten != "") {
            $sql = "SELECT * FROM Boote WHERE typ = '$typ' AND anzPersonen >= '$anzPersonenBuchung' AND anzKajueten >= '$anzKajueten'";
        } elseif ($typ != "Alle anzeigen" && $anzPersonenBuchung == "" && $anzKajueten != "") {
            $sql = "SELECT * FROM Boote WHERE typ = '$typ' AND anzKajueten >= '$anzKajueten'";
        } elseif ($typ = "Alle anzeigen" && $anzPersonenBuchung != "" && $anzKajueten == "") {
            $sql = "SELECT * FROM Boote WHERE anzPersonen >= '$anzPersonenBuchung'";
        } elseif ($typ = "Alle anzeigen" && $anzPersonenBuchung != "" && $anzKajueten != "") {
            $sql = "SELECT * FROM Boote WHERE anzPersonen >= '$anzPersonenBuchung' AND anzKajueten >= '$anzKajueten'";
        } elseif ($typ = "Alle anzeigen" && $anzPersonenBuchung == "" && $anzKajueten != "") {
            $sql = "SELECT * FROM Boote WHERE anzKajueten >= '$anzKajueten'";
        }

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) != null) {
            showResult($result, $connect, $tspmUserAnfangsDatum, $tspmUserEndDatum);
        } else {
            echo "<h3>Leider ergab deine Suche keine Ergebnisse</h3>";
            if ($_GET["typ"] == "Jolle") {
                echo '<p>Unsere Jollen haben leider keine Kajüten. Es gibt jedoch genug Stauraum vorne im Bugs, falls du überlegst eine Tagestour zu machen. <br> Wenn du weiterhing eine Jolle ausleihen willst, setzte den Filter bei Kajüten bitte auf null.</p>';
            }
            if ($_GET["typ"] == "Beiboot") {
                echo '<p>Bitte denke daran, dass Beiboote keine Kajüte besitzen. <br>Wenn du weiterhing ein Beiboot ausleihen willst, setzte den Filter bei Kajüten bitte auf null.</p>';
            }
            echo '<div class="platzhalter"></div>';
        }


        /*Funktion um alle boote nacheinander anzuzeigen*/
        function showResult($result, $connect, $tspmUserAnfangsDatum, $tspmUserEndDatum)
        {
            if ($_GET['reservation'] == null) {
                $ausgabe = '<p class="alertRed">Bitte ein Datum im Filter auswählen</p>';
            } else {
                $ausgabe = '<p>' . $_GET['reservation'] . '</p>';
            }
            if ($_GET['anzPersonen'] == null) {
                $ausgabePers = '<p class="alertRed">Bitte Anzahl der Personen im Filter auswählen</p>';
            } else {
                $ausgabePers = "<p>Anzahl Personen: " . $_GET['anzPersonen'] . '</p>';
            }

            while ($row = mysqli_fetch_array($result)) {

                /*Um Herauszufinden ob ein Boot angezeigt werden kann oder schon gebucht wurde, muss die BuchungsDB geladen werden*/
                $sql1 = "SELECT * From Buchungen WHERE bootsId = $row[id]";
                $result1 = mysqli_query($connect, $sql1);
                if (mysqli_num_rows($result1)) {
                    while ($row1 = mysqli_fetch_array($result1)) {
                        if ($tspmUserAnfangsDatum == "" && $tspmUserEndDatum == "") {
                            $IsbootNotBookable = "1";
                            $bookableText = "";
                            $isBookableGlyph = "<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>";

                        } else {
                            if ($tspmUserAnfangsDatum > strtotime($row1['endDatum']) || $tspmUserEndDatum < strtotime($row1['startDatum'])) {
                                $IsbootNotBookable = "1";
                                $bookableText = "";
                                $isBookableGlyph = "<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>";
                            } else {
                                $IsbootNotBookable = "0";
                                $bookableText = "<p class=\"alertRed\">Leider ist das Boot zu deinem gewünschten Datum vermietet</p>";
                                $isBookableGlyph = "<span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>";
                                break;
                            }
                        }
                    }
                } else {
                    $IsbootNotBookable = "1";
                    $bookableText ="";
                    $isBookableGlyph = "<span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>";
                }

                $schlafplatz = floatval($row["anzKajueten"]) * 2;

                /* Preis aufgrund von Haupt oder Nebensaison bestimmen*/
                $aktuellerMonat = date("m");
                if ($aktuellerMonat < 6 || $aktuellerMonat > 10) {
                    $preisProTag = $row['preisNS'];
                } else {
                    $preisProTag = $row['preisHS'];
                }

                //Prüfen ob anzahlSchlafplätze angezeigt werden muss
                if($row["anzKajueten"] == 0){

                }else{
                    $showNumbersOfRooms = "<li class=\"flex-container space-between\"><p><img src=\"assets/icons/bed.svg\" width=\"22\" height=\"15\" ><br>  $schlafplatz  Schlafplätze </p></li>";
                }

                /*Prüfung ob Sbf notwenig ist*/
                if ($row["sbf"] == "0") {
                    $needSbf = "Kein SBF notwenig";
                } else {
                    $needSbf = "Nur mit SBF mietbar";
                }

                if ($_GET["anzPersonen"] != "" && $_GET["reservation"] != "" && $IsbootNotBookable == 1) {
                    $abschicken = "booking.php";
                    $input = ' <input name="ausleihdatum" type="hidden" value=" ' . $_GET[reservation] . '"><input name="id" type="hidden" value="' . $row[id] . '" ><input name="anzPersonenBuchung" type="hidden" value="' . $_GET[anzPersonen] . '">';
                    $button = '<button type="submit" id="buttonID" value="' . $row['id'] . '" class="btn btn-primary">Auswählen</button>';
                } else {
                    $abschicken = "results.php?typ='.$_GET[typ]";
                    $input = '<input name="typ" type="hidden" value="' . $_GET[typ] . '">';
                    $button = '<button type="submit" id="buttonID" disabled="disabled" value="' . $row['id'] . '" class="btn btn-primary">Auswählen</button>';
                }
                echo '
                <div id="panel1" class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="user"><img class="img-circle img-fit" width: 180px height="180" src="' . $row['bildId'] . '"></div>
                    <div class="panel-body">
                        <div>
                            <h3>' . $row["bootname"] . '</h3>
                            <p class="schiffsname">' . $row["bootModell"] . '</p>
                            <p>'.$row['bootText'].'</p>
                        </div>
                       
                        <div class="panelUnten">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-xs-6"><p><span class="panel-type">Bootstyp: </span></p></div>
                                        <div class="col-xs-6"><p>' . $row['typ'] . ' </p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6"><p><span class="panel-type">Anzahl max. Personen:</span></p></div>
                                        <div class="col-xs-6"><p>' . $row['anzPersonen'] . ' </p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6"><p><span class="panel-type">Anzahl der Kajüten:</span></p></div>
                                        <div class="col-xs-6"><p>' . $row['anzKajueten'] . ' </p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6"><p><span class="panel-type">Länge:</span></p></div>
                                        <div class="col-xs-6"><p>' . $row['length'] . ' m</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6"><p><span class="panel-type">Preis:</span></p></div>
                                        <div class="col-xs-6"><p> &euro; ' . $preisProTag . ' / Tag</p></div>
                                    </div>  
                                </div>                
                                <div class="col-md-6">      
                                    <form action="' . $abschicken . '" class="form-horizontal" method="get">
                                        <fieldset>
                                            <div class="control-group">                 
                                                <div class="controls">
                                                    <div class="input-prepend">
                                                        <h3>Dein Ausgewähltes Datum: </h3>                                                       
                                                        ' . $ausgabe . ' 
                                                        ' . $bookableText . '  
                                                        ' . $ausgabePers . '
                                                        ' . $input . '
                                                        ' . $button . '            
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>     
                                </div>                                          
                            </div>
                        <hr> 
                        </div>
                        <div>
                            <ul class="flex-container space-between">
                                <li class="flex-container space-between"><p><svg width="22" height="15" viewBox="0 0 22 15"><g fill="none" fill-rule="evenodd"><path fill="#777" fill-rule="nonzero" d="M2.933 9h-.517c-.303-1.137-.538-1.774-.704-1.91-.366-.302-2.16-.763-.555-2.808C2.76 2.236 5.96 0 10.887 0c4.925 0 8.631 2.143 10.061 4.282 1.43 2.138-.333 2.391-.643 2.819-.138.19-.33.824-.578 1.899H2.933zm16.338 2c-.916 2.436-3.111 3.958-8.391 4-5.318.04-7.552-2.008-8.29-4h16.68z"></path> <path fill="#FFF" d="M7.648 6.01c-.065 0-.11-.028-.134-.085-.025-.057-.017-.104.024-.142l.829-.775a.137.137 0 0 1 .098-.034c.04 0 .073.011.097.034l.829.775c.04.038.049.085.024.142-.024.057-.069.086-.134.086h-.426c.113.296.345.543.694.74.317.175.67.285 1.06.33V4.917h-.633a.146.146 0 0 1-.104-.04.128.128 0 0 1-.042-.097v-.456c0-.038.014-.07.042-.096a.146.146 0 0 1 .104-.04h.634V4.13a1.154 1.154 0 0 1-.56-.399 1.02 1.02 0 0 1-.22-.638c0-.304.116-.564.347-.78.232-.217.51-.321.835-.314.325.008.6.118.823.33.223.213.335.468.335.764 0 .236-.073.448-.22.638-.145.19-.332.323-.56.399v.057h.634c.04 0 .075.013.104.04a.128.128 0 0 1 .042.096v.456c0 .038-.014.07-.042.097a.146.146 0 0 1-.104.04h-.634V7.08c.39-.045.744-.155 1.06-.33.35-.197.582-.444.695-.74h-.426c-.065 0-.11-.029-.134-.086-.025-.057-.017-.104.024-.142l.829-.775a.137.137 0 0 1 .097-.034c.041 0 .074.011.098.034l.829.775c.04.038.049.085.024.142-.024.057-.069.086-.134.086h-.39c-.09.372-.288.702-.597.99-.293.267-.65.472-1.073.616a3.973 3.973 0 0 1-2.584 0 3.026 3.026 0 0 1-1.073-.615 1.974 1.974 0 0 1-.597-.991h-.39zM11 2.73a.388.388 0 0 0-.274.108.34.34 0 0 0 0 .512.388.388 0 0 0 .274.109.388.388 0 0 0 .274-.109.34.34 0 0 0 0-.512A.388.388 0 0 0 11 2.73z"></path></g></svg><br>Skipper auf Anfrage</p></li>
                                <li class="flex-container space-between"><p><img src="assets/icons/multiple-users-silhouette.svg" width="22" height="15" ><br>Max. ' . $row["anzPersonen"] . ' Personen</p></li>
                                <li class="flex-container space-between"><p><img src="assets/icons/calendar.svg" width="22" height="15" ><br>Min. Mietdauer 1 Tag</p></li>
                                '.$showNumbersOfRooms.'
                                <li class="flex-container space-between"><p><img src="assets/icons/fahrerlaubnis.svg" width="22" height="15" ><br>' . $needSbf . '  </p></li>
                            </ul>
                        </div>
                    </div>
                </div>';
            }
        }

        ?>
    </div>
    <!-- /#page-content-wrapper -->
</div> <!-- End Wrapper -->

<br><br>

<!-- Datepicker -->
<script>
    var picker = new Lightpick({
        field: document.getElementById('datepicker'),
        singleDate: false,
        minDate: new Date(),
        format: 'DD.MM.YYYY',
        onSelect: function (start, end) {
            var str = '';
            str += start ? start.format('DD.MM.YYYY') + ' bis zum ' : '';
            str += end ? end.format('DD.MM.YYYY') : '...';
            document.getElementById('result-2').innerHTML = str;
        }
    });
</script>

<!-- script sidebar opener/closer -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<?php include("components/footer.php") ?>

