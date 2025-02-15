<?php
// Подключение к базе данных
$servername = "localhost"; // Хост базы данных
$username = "gdps_kventargdps"; // Логин базы данных
$password = "gkuj611nq5fuv85n80kqoq"; // Пароль базы данных
$dbname = "gdps_db"; // Имя базы данных

// Создание соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// SQL запрос для получения всех уровней
$sql = "SELECT * FROM levels";  // Убедись, что у тебя есть таблица levels
$result = $conn->query($sql);

// Проверка, есть ли результаты
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Выводим данные каждого уровня
        echo "<div class='level'>";
        echo "<h2>" . htmlspecialchars($row['levelName']) . " (ID: " . $row['levelID'] . ")</h2>";
        echo "<p><strong>Создатель:</strong> " . htmlspecialchars($row['userName']) . "</p>";
        echo "<p><strong>Описание:</strong> " . htmlspecialchars($row['levelDesc']) . "</p>";
        echo "<p><strong>Версия игры:</strong> " . htmlspecialchars($row['gameVersion']) . "</p>";
        echo "<p><strong>Трек:</strong> " . ($row['audioTrack'] ? $row['audioTrack'] : "Пользовательский трек (ID: " . $row['songID'] . ")") . "</p>";
        echo "<p><strong>Монеты:</strong> " . htmlspecialchars($row['coins']) . "</p>";
        echo "<p><strong>Запрашиваемые звезды:</strong> " . htmlspecialchars($row['requestedStars']) . "</p>";
        echo "<p><strong>Оценка уровня:</strong> " . htmlspecialchars($row['starDifficulty']) . "</p>";
        echo "<p><strong>Скачивания:</strong> " . htmlspecialchars($row['downloads']) . "</p>";
        echo "<p><strong>Лайки:</strong> " . htmlspecialchars($row['likes']) . "</p>";
        echo "<p><strong>Дата загрузки:</strong> " . htmlspecialchars($row['uploadDate']) . "</p>";
        echo "<p><strong>Дата обновления:</strong> " . htmlspecialchars($row['updateDate']) . "</p>";
        echo "<p><strong>Дата оценки:</strong> " . htmlspecialchars($row['rateDate']) . "</p>";
        echo "<p><strong>Эпик статус:</strong> " . ($row['starEpic'] ? "Да" : "Нет") . "</p>";
        echo "<p><strong>Приватный уровень:</strong> " . ($row['unlisted'] ? "Да" : "Нет") . "</p>";
        echo "</div>";
    }
} else {
    echo "Нет уровней для отображения.";
}

// Закрытие соединения с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Уровни - KventarGDPS</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; color: #333; }
        .level { background-color: white; padding: 15px; margin: 10px 0; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .level h2 { color: #333; }
        .level p { margin: 5px 0; }
        .level strong { color: #555; }
    </style>
</head>
<body>

<header>
    <h1>Список уровней KventarGDPS</h1>
</header>

<section>
    <!-- Здесь будет отображаться каждый уровень -->
</section>

</body>
</html>