<?php include_once "menu.php"; ?>

<?php

// Подключение к базе данных MySQL
require_once "db_connection.php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка запроса на удаление данных
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Удаление данных пользователя
    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Данные пользователя успешно удалены.";
    } else {
        echo "Ошибка при удалении данных пользователя: " . $conn->error;
    }
}

// Получение данных из таблицы "users"
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Вывод данных в виде таблицы
if ($result->num_rows > 0) {
    echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Удаление данных</title>
                <link rel="stylesheet" type="text/css" href="css/style.css">

        </head>
        <body>
            <div class="container-xl">
                <h1>Удаление данных</h1>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Почта</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["firstName"] . '</td>';
        echo '<td>' . $row["lastName"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td><a href="delete_data.php?id=' . $row["id"] . '" class="edit" class="material-icons" >Удалить</a></td>';
        echo '<i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i>';
        echo '</tr>';
    }
    
    


    echo '</tbody>
                </table>
            </div>
            <script src=""></script>
        </body>
        </html>';
} else {
    echo "0 результатов";
}

// Закрытие соединения с базой данных
$conn->close();
?>
