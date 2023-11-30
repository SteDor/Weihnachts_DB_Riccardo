<?php
    require_once('../Weihnachts_Essen_DB/config.php');
    include ('../Weihnachts_Essen_DB/Models/User.php');

    

	$firstName = "";
	$lastName = "";
    $mainDish = "";
    $dessert = "";
	$message = "";
	if(isset($_POST['btSubmit'])) {
		$message = "Formular wurde abgeschickt!";
		if(empty($_POST['tfFirstName']) || empty($_POST['tfLastName']) || empty($_POST['tfMainDish']) || empty($_POST['tfDessert'])) {
			$message = "<p>Bitte füllen Sie alle Felder aus.</p>";
		} else {
            foreach($_POST as $element) {
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$element)) {
                    //$message = "Only letters and white space allowed";
                    die("<p>Fehler in " . $element . "<b> Hacken verboten!!!</b></p>");
                  }
                else{
                    $message = "<p>Formular wurde ordnungsgemäß ausgefüllt.</p>";
                    $firstName = $_POST['tfFirstName'];
                    $lastName = $_POST['tfLastName'];
                    $mainDish = $_POST['tfMainDish'];
                    $dessert = $_POST['tfDessert'];
                } 
            }
           //$user = new User($firstName, $lastName, $mainDish, $dessert);
            $userString = 
                $firstName . "|" . 
                $lastName . "|" .
                $mainDish . "|" .
                $dessert;

            $db->addPreparedStatmentGuests($servername, $username, $password, $databasename, $userString);

            //print_r($user);
            
            echo "<br>Hallo ". $firstName . " " . $lastName ." du wünscht dir: " . $mainDish . " und " . $dessert; 
            }
			
		}
	

?>

<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wünsche fürs Weihnachtsessen</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>


<h1 style="background-color:powderblue; color:crimson;text-align:center">Geben Sie hier Ihren Namen und Ihre Essenwünsche für die Weihnachtsfeier ein.</h1>
	
<p><?php echo $message?></p>
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
		<fieldset>
            <img src="..\Weihnachts_Essen_DB\Img\Weihnachtsbaum.jpg" alt="Christmastree" width="250" height="300">
            <img src="..\Weihnachts_Essen_DB\Img\Weihnachtsbaum.jpg" alt="Christmastree" width="250" height="300">
            <hr>
			<legend style="color:darkmagenta"><b>Weihnachts Wunsch</b></legend>

			<label for="tfName">Vorname:</label>
			<input type="text" id="tfFirstName" name="tfFirstName" placeholder="Vorname" value="">
			<br><br>
            <label for="tfName">Nachname:</label>
			<input type="text" id="tfLastName" name="tfLastName" placeholder="Nachname" value="">
			<br><br>
            <label for="tfName">Hauptgang:</label>
			<input type="text" id="tfMainDish" name="tfMainDish" placeholder="Hauptspeise" value="">
			<br><br>
            <label for="tfName">Nachspeise:</label>
			<input type="text" id="tfDessert" name="tfDessert" placeholder="Nachspeise" value="">
			<br><br>

			<input type="submit" id="btSubmit" name="btSubmit" value="Absenden">
		</fieldset>
	</form>
</body>

</html>