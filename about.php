<?php
if($_POST['email'] != "" && $_POST['name'] != "" && $_POST['anfrage'] != ""){
    $emailTo = "jonjac@outlook.de";
    $subject = $_POST['name'];
    $content = $_POST['anfrage'];
    $headers = "From: " . $_POST['email'];
    if (mail($emailTo, $subject, $content, $headers)) {
        $successMessage = '<div class="alert alert-success" role="alert"><p><b>Alles hat geklappt. Vielen Dank für deine Nachricht!</b></p></div>';
    } else {
        $error = '<div class="alert alert-danger" role="alert"><p><b>Deine Nachricht konnte nicht gesendet werden. Bitte versuche es noch einmal.</b></p></div>';
    }
}

include("components/config.php");
include("components/header.php");
include("components/navbar.php");
?>
    <div class="jumbotron">
        <div class="container">
            <h1>XXL Baltic Yachting</h1>
            <p>Dein Segelcharter in Kiel</p>
            <p><a class="btn btn-primary btn-lg" href="index.php" role="button">Segelboote finden &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <h2>Einmalige Momente erleben</h2>

        <div class="row">
            <div class="col-md-7">
                <p>Hochwertig, komfortabel und majestätisch: Ein Segelboot befördert Ihren Bootsurlaub in ganz neue Dimensionen. Die neuesten Modelle zeichnen sich durch die Kombination von Wohnlichkeit, Funktionalität und jede Menge Möglichkeit zur Entspannung aus. Wassersport mit Wasserski oder Wakeboard sowie die Mahlzeiten an Bord sind das i-Tüpfelchen Ihres Yachtcharter, wenn Sie sich eine Luxusyacht mieten.</p>
                <p>Während der professionelle Skipper mit seiner Crew Sie an die schönsten Orte navigiert, können Sie sorgenfrei ein Glas Champagner genießen und den Blick in die Weite schweifen lassen.</p>
                <h2>Wie du uns erreichen Kannst</h2>
                <p>Du möchtest uns eine Nachricht zukommen lassen oder hast fragen zu unserem Angebot? Dann Rufe uns einfach an oder nutze unsere Kontaktformular</p>
                <div class="row">
                    <div class="col-md-6"><a href=""><p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Ruf uns an</p></a></div>
                    <div class="col-md-6"><a href="#kontaktformular"><p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Schreibe uns per Kontaktformular</p></a></div>
                </div>
                <h4>Unsere Daten</h4>
                <div class="row">
                    <div class="col-md-6">
                        <p>Telefon: <br>+49 041 0930 0</p>
                        <p>Anschrift: <br>Brandenburger Str. 4 <br> 24106 Kiel</p>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="responsiveContainer">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2325.0228520943!2d10.139822915621378!3d54.35657718020317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b2561e5dc4538d%3A0xecea47734478ee9e!2sBrandenburger%20Str.%2C%2024106%20Kiel!5e0!3m2!1sde!2sde!4v1574692536585!5m2!1sde!2sde" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <hr>
        <!-- Beispiel-Zeile von Spalten -->
        <div class="row">
            <div class="col-md-4">
                <h2>Buchen</h2>
                <p>Mit der Suchfunktion können Sie alle Boote finden die wir anbieten. Bei uns finden Sie Segelboote zum besten Preis. Unsere inbegriffene Versicherung ermöglicht Ihnen risikoloses mieten und segeln.</p>
            </div>
            <div class="col-md-4">
                <h2>Zahlung</h2>
                <p>Buchen Sie direkt und sicher online und mieten Sie mit wenigen Klicks oder Segelboot Ihrer Träume. Wenn sie per Kredikarte zahlen wird der Preis erst nach Annahme Ihrer Mietanfrage durch uns abgebucht. 100 % sichere Bezahlung.</p>
            </div>
            <div class="col-md-4">
                <h2>Versicherung</h2>
                <p>Eine Optionale Vollkaskoversicherung bis zu 8 Millionen Euro und sichere Kautionshinterlegung sind möglich.</p>
            </div>
        </div>

        <hr id="kontaktformular">

        <h2>Kontaktformular</h2>
        <?php echo $error ?>
        <?php echo $successMessage ?>
        <form method="post">
            <div class="form-group">
                <label for="beispielFeldEmail1">Deine Email-Adresse</label>
                <input name="email" type="email" class="form-control" id="email"
                       placeholder="Beispiel: max.mustermann@web.de" required="required">
            </div>

            <div class="form-group">
                <label for="titel">Dein Name</label>
                <input type="text" name="name" class="form-control" id="titel" placeholder="Beispiel: Max Mustermann" required="required">
            </div>

            <div class="form-group">
                <label for="anliegen">Deine Anfrage</label>
                <textarea class="form-control" name="anfrage" id="content" rows="5"
                          placeholder="Schreibe hier was du uns gerne Mitteilen würdest" required="required"></textarea>
            </div>
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck29" required>
            <label style="font-weight: 400" class="form-check-label" for="invalidCheck29">Mit abschicken deiner Anfrage stimmst du unseren AGB's* zu</label><br>
            <button type="submit" id="submit" class="btn btn-primary">Abschicken</button><br>
            <br><br>
            <br><br>
        </form>

    </div>
<?php
include("components/footer.php");
?>

