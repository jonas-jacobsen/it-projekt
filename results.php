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
$preis = $_GET['preisHS'];
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
                        <label for="anzPersonen">Segelbootstyp</label>
                        <div class="col-sm-10">
                            <select name="typ" class="form-control" id="typ">
                                <option><?php echo $typ ?></option>
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
                        <label for="anzPersonen">Anzahl der Personen</label>
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
                        <label for="anzPersonen">Anzahl der Kajüten</label>
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
                        <label for="anzPersonen">Datum auswählen</label>
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

        if ($anzPersonenBuchung == "" && $anzKajueten == "") {
            $sql = "SELECT * FROM Boote WHERE typ = '$typ'";
        } elseif ($anzPersonenBuchung != "" && $anzKajueten == "") {
            $sql = "SELECT * FROM Boote WHERE typ = '$typ' AND anzPersonen >= '$anzPersonenBuchung'";
        } elseif ($anzPersonenBuchung != "" && $anzKajueten != "") {
            $sql = "SELECT * FROM Boote WHERE typ = '$typ' AND anzPersonen >= '$anzPersonenBuchung' AND anzKajueten >= '$anzKajueten'";
        } elseif ($anzPersonenBuchung == "" && $anzKajueten != "") {
            $sql = "SELECT * FROM Boote WHERE typ = '$typ' AND anzKajueten >= '$anzKajueten'";
        }

        $result = mysqli_query($connect, $sql);
        // echo $sql;
        if (mysqli_num_rows($result) != null) {
            showResult($result, $connect);
        } else {
            echo "<h3>Leider ergab deine Suche keine Ergebnisse</h3>";
            if($_GET["typ"]=="Jolle"){
                echo '<p>Unsere Jollen haben leider keine Kajüten. Es gibt jedoch genug Stauraum vorne im Bugs, falls du überlegst eine Tagestour zu machen. <br> Wenn du weiterhing eine Jolle ausleihen willst, setzte den Filter bei Kajüten bitte auf null.</p>';
            }
            if($_GET["typ"]=="Beiboot"){
                echo '<p>Bitte denke daran, dass Beiboote keine Kajüte besitzen. <br>Wenn du weiterhing ein Beiboot ausleihen willst, setzte den Filter bei Kajüten bitte auf null.</p>';
            }
            echo '<div class="platzhalter"></div>';
        }

        function showResult($result, $connect)
        {
            if ($_GET['reservation'] == null) {
                $ausgabe = '<p class="alertRed">Bitte ein Datum im Filter auswählen</p>';
            } else {
                $ausgabe = '<p>'.$_GET['reservation'] . '</p>';
            }
            if ($_GET['anzPersonen'] == null) {
                $ausgabePers = '<p class="alertRed">Bitte Anzahl der Personen im Filter auswählen</p>';
            } else {
                $ausgabePers = "<p>Anzahl Personen: ".$_GET['anzPersonen'] . '</p>';
            }
            while ($row = mysqli_fetch_array($result)) {
                if ($_GET["anzPersonen"] != "" && $_GET["reservation"] != ""){
                    $abschicken = "booking.php";
                    $input = ' <input name="ausleihdatum" type="hidden" value=" ' . $_GET[reservation] . '"><input name="id" type="hidden" value="' . $row[id] . '" ><input name="anzPersonenBuchung" type="hidden" value="' . $_GET[anzPersonen] . '">';
                    $button = '<button type="submit" id="buttonID" value="' . $row['id'] . '" class="btn btn-primary">Anfragen</button>';
                } else {
                    $abschicken = "results.php?typ='.$_GET[typ]";
                    $input = '<input name="typ" type="hidden" value="' . $_GET[typ] . '">';
                    $button = '<button type="submit" id="buttonID" disabled="disabled" value="' . $row['id'] . '" class="btn btn-primary">Anfragen</button>';
                }
                echo '
                 <div id="panel1" class="panel panel-default">
                <div class="panel-heading">' . $row['bootname'] . '</div>
                <div class="user"><img class="img-circle" src="assets/pics/panelicon.jpg"></div>
                    <div class="panel-body">
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
                                    <div class="col-xs-6"><p> ' . $row['preisHS'] . '&euro; pro Tag</p></div>
                                </div>
                            </div>                
                            <div class="col-md-6">                    
                                <form action="'.$abschicken.'" class="form-horizontal" method="get">
                                    <fieldset>
                                        <div class="control-group">                 
                                            <div class="controls">
                                                <div class="input-prepend">
                                                    <h3>Dein Ausgewähltes Datum: </h3>
                                                    ' . $ausgabe . '
                                                    '.$ausgabePers.'
                                                    '.$input.'
                                                    '.$button.'                   
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>                 
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

