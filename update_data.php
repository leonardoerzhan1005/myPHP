<?php
// Подключение к базе данных MySQL
require_once "db_connection.php";
 include_once "menu.php"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка формы обновления данных
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];

    // Обновление данных пользователя
    $sql = "UPDATE users SET firstName='$firstName', lastName='$lastName', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Данные пользователя успешно обновлены.";
    } else {
        echo "Ошибка при обновлении данных пользователя: " . $conn->error;
    }
}

// Получение данных пользователя для предварительного заполнения формы
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $email = $row["email"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Обновление данных</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Обновление данных</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="firstName">Имя:</label>
                <input type="text" class="form-control" name="firstName" value="<?php echo $firstName; ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Фамилия:</label>
                <input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>">
            </div>
            <div class="form-group">
                <label for="email">Почта:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Закрытие соединения с базой данных
$conn->close();
?>
