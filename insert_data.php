<?php
// Включение файла с подключением к базе данных
require_once "db_connection.php";
include_once "menu.php"; 
// Обработка формы вставки данных
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];

    // Вставка новой записи в таблицу
    $sql = "INSERT INTO users (firstName, lastName, email) VALUES ('$firstName', '$lastName', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Новая запись успешно добавлена.";
    } else {
        echo "Ошибка при добавлении новой записи: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Вставка данных</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php include_once "menu.php"; ?>

    <div class="container">
        <h1>Вставка данных</h1>
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
            <button type="submit" class="btn btn-primary">Добавить</button>
            <a href="view_data.php" class="btn btn-secondary">Просмотр данных</a>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Закрытие соединения с базой данных
$conn->close();
?>
