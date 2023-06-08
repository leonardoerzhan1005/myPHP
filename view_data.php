<?php
 include_once "menu.php"; 
// Подключение к базе данных MySQL
require_once "db_connection.php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из таблицы "users"
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Вывод данных в виде таблицы
if ($result->num_rows > 0) {
    echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Просмотр данных</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container">
                <h1>Просмотр данных</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Почта</th>
                        </tr>
                    </thead>
                    <tbody>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["firstName"] . '</td>';
        echo '<td>' . $row["lastName"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>
                </table>
            </div>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>';
} else {
    echo "0 результатов";
}

// Закрытие соединения с базой данных
$conn->close();
?>
