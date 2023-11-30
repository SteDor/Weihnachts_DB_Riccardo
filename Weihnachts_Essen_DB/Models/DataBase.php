<?php 

class DataBase {
  
    function __construct(public $servername, public $username, public $password, public $databasename){}    
    public function checkConnection($conn) {
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
  }

    public function showAllGuests($servername, $username, $password, $databasename){
    // Create connection
    $conn = new mysqli($servername, $username, $password, $databasename);
    // Check connection
    $this->checkConnection($conn);
  
    $sql = "SELECT GuestID, FirstName, LastName, MainDish, Dessert FROM Guests";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["GuestID"]. 
        " - Name: " . $row["FirstName"]. " " . $row["LastName"].
        "<br> - Hauptgang: " . $row["MainDish"] . 
        "<br> - Dessert: " . $row["Dessert"] . "<br>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
  }

  public function addPreparedStatmentGuests($servername, $username, $password, $databasename,$userString){
    $conn = new mysqli($servername, $username, $password, $databasename);

    // Check connection
    $this->checkConnection($conn);

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO Guests (FirstName, LastName, MainDish, Dessert) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $lastname, $maindish, $dessert);
    $userArray = explode('|', $userString);
    for($i=0; $i<count($userArray); $i += 4) {
        $firstname = $userArray[$i];
        $lastname = $userArray[$i + 1];
        $maindish = $userArray[$i + 2];
        $dessert = $userArray[$i + 3];
        $stmt->execute();
        }
        
        echo ("<br>" . $firstname . " " . $lastname . " was added to table Guests" . "<br>");

        $this->showAllGuests($servername, $username, $password, $databasename);
    $stmt->close();
    $conn->close();
}
}    
?>