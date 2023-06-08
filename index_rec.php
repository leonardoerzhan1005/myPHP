
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Меню базы данных</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="create_table.php">Создать таблицу</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="insert_data.php">Добавить данные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_data.php">Просмотреть данные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update_data.php">Обновить данные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delete_data.php">Удалить данные</a>
                </li>
            </ul>
        </div>
    </nav>

<?php

//$connection = mysqli_connect('localhost', 'root', 'number1er', 'pets');



// Подключение к базе данных MySQL
$servername = "localhost";
$username = "root";
$password = "number1er";
$dbname = "pets";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выполнение SQL-запроса
$sql = "SELECT * FROM transaction";
$result = $conn->query($sql);

// Вывод результатов
if ($result->num_rows > 0) {
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col">';
    
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<tr><th scope="col">txn_id</th><th scope="col">txn_type_cd</th><th scope="col">txn_date</th><th scope="col">amount</th><th scope="col">account_id</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["txn_id"] . '</td>';
        echo '<td>' . $row["txn_type_cd"] . '</td>';
        echo '<td>' . $row["txn_date"] . '</td>';
        echo '<td>' . $row["amount"] . '</td>';
        echo '<td>' . $row["account_id"] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo "0 results";
}

// Закрытие соединения с базой данных
$conn->close();
?>
</body>
</html>

