<?php
include ("components/config.php");
include ("components/header.php");
include ("components/navbar.php");




/*sql buchungstabelle abfrage dann id vergleichen und mit datum abgleichen wenn wenn keine Übereinstimmmung gefunden hier weiter sonst else nichts anzeigen*/
/*Buchungen aus der DB laden*/
$ausleihDatum = $_GET['reservation'];
/*Berechnung über Zeitraum ob boote ausleihbar sind, deswegen muss das  $ausleihDatum in andfang und Enddatum aufgesplittet werden*/
/*String Kalenderdatum von bis umwandeln in zwei Strings um Tage auszurechnen */
list($anfangsDatum, $endDatum) = explode("-", $ausleihDatum);
$sql7 = "SELECT * FROM Buchungen WHERE bootsId = $row[id]";
$result7 = mysqli_query($connect, $sql7);
$row7 = mysqli_fetch_array($result7);
if($endDatum < $row7["anfangsDatum"] || $anfangsDatum > $row7["endDatum"]){
    echo "funktioniert";
} else {
    echo "funktioniert nicht";
}
/*Ende überprüfung auf Calenderübereinstimmung*/




$startdatum = "2019-11-02";
$endDatum = "2019-12-10";

$datumseingabeAnf = "2019-11-02";
$datumseingabeEnd = "2019-11-04";

if ($datumseingabeEnd < $startdatum || $datumseingabeAnf > $endDatum){
    $satz = "alles in Ordnung";

} else{
    $satz = "buchung leider nicht möglich";
}

echo $startdatum ."<br>";
echo $endDatum."<br>";
echo $datumseingabeAnf."<br>";
echo $datumseingabeEnd."<br>";

echo $satz;

$bootId = 5;


$sql = "SELECT * FROM Boote,Buchungen WHERE Boote.id = $bootId AND Buchungen.bootsId = $bootId";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

?>


<div>
<?php echo $row ?>
</div>
<div>
    <?php

    ?>

</div>
<div class="container col-sm-4 col-md-7 col-lg-4 mt-5">
    <div class="card">
        <h3 class="card-header" id="monthAndYear"></h3>
        <table class="table table-bordered table-responsive-sm" id="calendar">
            <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>

        <div class="form-inline">

            <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Previous</button>

            <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
        </div>
        <br/>
        <form class="form-inline">
            <label class="lead mr-2 ml-2" for="month">Jump To: </label>
            <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                <option value=0>Jan</option>
                <option value=1>Feb</option>
                <option value=2>Mar</option>
                <option value=3>Apr</option>
                <option value=4>May</option>
                <option value=5>Jun</option>
                <option value=6>Jul</option>
                <option value=7>Aug</option>
                <option value=8>Sep</option>
                <option value=9>Oct</option>
                <option value=10>Nov</option>
                <option value=11>Dec</option>
            </select>


            <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
                <option value=2019>2019</option>
                <option value=2020>2020</option>
                <option value=2021>2021</option>
                <option value=2022>2022</option>
                <option value=2023>2023</option>
                <option value=2024>2024</option>
                <option value=2025>2025</option>
                <option value=2026>2026</option>
                <option value=2027>2027</option>
                <option value=2028>2028</option>
                <option value=2029>2029</option>
                <option value=2030>2030</option>
            </select></form>
    </div>
</div>
<!--<button name="jump" onclick="jump()">Go</button>-->
<script src="js/calendar.js"></script>
</body>
</html>