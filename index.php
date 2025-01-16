<?php
// اتصال بقاعدة البيانات
$servername = "db"; // اسم خدمة قاعدة البيانات في docker-compose.yml
$username = "root";
$password = "123"; // كلمة المرور التي ستستخدمها لقاعدة البيانات
$dbname = "dictionary";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// إذا تم إرسال كلمة من النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST['word'];

    // البحث عن الكلمة في قاعدة البيانات
    $sql = "SELECT definition FROM words WHERE word = '$word'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // عرض التعريف
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