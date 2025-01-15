<?php
// اتصال بقاعدة البيانات
$servername = "db";
$username = "root";
$password = "123";
$dbname = "dictionary";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// البحث عن الكلمة
$word = $_POST['word'] ?? '';
$definition = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "SELECT definition FROM words WHERE word = '$word'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $definition = $row["definition"];
        }
    } else {
        $definition = "No definition found for '$word'";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Dictionary</title>
</head>
<body>
    <h1>Simple Dictionary</h1>
    <form method="post">
        <label>Enter a word:</label>
        <input type="text" name="word" value="<?php echo htmlspecialchars($word); ?>">
        <button type="submit">Search</button>
    </form>
    <p>Definition: <?php echo htmlspecialchars($definition); ?></p>
</body>
</html>
