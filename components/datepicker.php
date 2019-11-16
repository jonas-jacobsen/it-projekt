<?php
include("config.php");
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

</head>
<body>

<form action="action.php" method="post">
    <p>Ihr Name: <input type="text" name="name" /></p>
    <p>Ihr Alter: <input type="text" name="alter" /></p>
    <p><input type="submit" /></p>
</form>
<?php
if ($_POST["submit"]) {
    header('Location: index.php');
} else {
    echo "wurde nicht gedrückt";
}
?>
</body>
</html>