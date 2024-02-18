<?php
require_once 'db.php';

// Получение сохраненных лотов из базы данных
$sql = "SELECT id, url, description, start_price, email, phone, inn, case_number, auction_date FROM lots";
$result = $mysqli->query($sql);

// Вывод данных о лотах
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['url']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "<td>" . htmlspecialchars($row['start_price']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['phone']) ."</td>";
        echo "<td>" . htmlspecialchars($row['inn']) ."</td>";
        echo "<td>" . htmlspecialchars($row['case_number']) ."</td>";
        echo "<td>" . htmlspecialchars($row['auction_date']) ."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='9'>Нет результатов</td>";
    echo "</tr>";
}

$mysqli->close();

