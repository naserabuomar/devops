<?php

$servername = "db"; 
$username = "root";
$password = "123"; 
$dbname = "dictionary";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST['word'];


    $sql = "SELECT definition FROM words WHERE word = '$word'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo "Definition: " . $row["definition"];
        }
    } else {
        echo "No definition found for '$word'";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h1>Simple Dictionary</h1>
<form method="post">
    Enter a word: <input type="text" name="word">
    <input type="submit" value="Search">
</form>
</body>
</html>