<?php

function build_calendar($month,$year){

    //$sql1 = "SELECT startDatum, endDatum FROM `Buchungen` WHERE bootsId = $row[id]";

    $dayIsBooked = 0;

    $daysOfWeek = array('Sonntag','Monat','Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag');

    //First day of the month
    $firstDayOfMonth = mktime(0,0,0,$month, 1, $year);

    //numbers of Days in the Month
    $numberDays = date("t", $firstDayOfMonth);

    //Getting some Information
    $dateComponents = getdate($firstDayOfMonth);

    //Getting the name of the month
    $monthName = $dateComponents['month'];

    //Getting the index Value
    $dayOfWeek = $dateComponents['wday'];

    //Getting the Current Date
    $dateToday = date('Y-m-d');

    //Creating the HTML Table
    $calendar = "<table class='table table-bordered'>";
    $calendar.= "<div style='text-align: center'><h4>$monthName $year</h4>";
    $calendar.="<a class='btn btn-xs- btn-primary' href='?month=".date('m',mktime(0,0,0,$month-1,1,$year))."&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Previous Month</a> ";
    $calendar.="<a class='btn btn-xs- btn-primary' href='?month=".date('m',mktime(0,0,0,$month+1,1,$year))."&year=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Next Month</a></div><br>";


    $calendar.= "<tr>";

    //creating the Calendar Headings
    foreach ($daysOfWeek as $day){
        $calendar.= "<th class='header'>$day</th>";
    }
    $calendar.= "</tr><tr>";

    if ($dayOfWeek > 0){
        for ($k=0;$k>$dayOfWeek;$k++){
            $calendar.="<td></td>";
        }
    }

    //initialing the dayCounter
    $currentDay = 1;

    //Getting the month number
    $month = str_pad($month, 2,"0",STR_PAD_LEFT);

    while ($currentDay<= $numberDays){

        //seventh Column (saturday) reached, start a new row
        if ($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar.= "</tr><tr>";
        }

        $currentDayRel = str_pad($month, 2,"0",STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        if ($dayIsBooked == 1){
            $calendar.="<td class='dayIsBooked'><h5>$currentDay</h5>";
        } else {
            $calendar.="<td><h5>$currentDay</h5>";
        }


        $calendar.="</td>";

        //Incrementing the counter
        $currentDay++;
        $dayOfWeek++;
    }

    //Completing the row of the last week in month, if necessary
    if($dayOfWeek!=7){
        $remainingDays = 7-$dayOfWeek;
        for ($i=0; $i < $remainingDays;$i++){
            $calendar.= "<td></td>";

        }
    }

    $calendar.= "</tr>";
    $calendar.= "</table>";

    echo $calendar;

}
?>