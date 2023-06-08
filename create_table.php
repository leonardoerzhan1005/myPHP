<?php
// Подключение к базе данных MySQL
require_once "db_connection.php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка формы создания пользователя
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    /asdadadaasd
    // Создание нового пользователя
    $sql = "INSERT INTO users (firstName, lastName, email) VALUES ('$firstName', '$lastName', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Новый пользователь успешно создан.";
    } else {
        echo "Ошибка при создании нового пользователя: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Создание пользователя</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include_once "menu.php"; ?>

    <div class="container">
        <h1>Создание пользователя</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="firstName">Имя:</label>
                <input type="text" class="form-control" name="firstName">
            </div>
            <div class="form-group">
                <label for="lastName">Фамилия:</label>
                <input type="text" class="form-control" name="lastName">
            </div>
            <div class="form-group">
                <label for="email">Почта:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Закрытие соединения с базой данных
$conn->close();
?>
