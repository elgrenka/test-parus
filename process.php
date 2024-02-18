<?php
require_once 'vendor/autoload.php';
require_once 'db.php';

use DiDom\Document;

$trade_number = $_GET['trade_number'];
$lot_number = $_GET['lot_number'];
$url = 'https://nistp.ru';

// Получение данных с помощью СURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);

curl_close($ch);

$document = new Document($html, true);

// Если лот найден, перейти на страницу с информацией о нём
$table = $document->first('table.data');
if ($table) {
    $rows = $table->find('tr');
    $lot_found = false;
    foreach ($rows as $row) {
        $cells = $row->find('td');
        if (count($cells) >= 2) {
            $trade_number_on_website = $cells[0]->text(); // Номер торгов на сайте
            $lot_number_on_website = $cells[2]->text(); // Номер лота на сайте
            $lot = "Лот № {$lot_number}";
            $pos = strpos($lot_number_on_website, $lot);
            $sub = substr($lot_number_on_website, $pos, strlen($lot));
            if ($trade_number_on_website == $trade_number && $sub == $lot) {
                $lot_found = true;
                $href = $cells[2]->first('a')->attr('href');
                header("Location: $href");

// Получение данных о лоте
                $document2 = new Document($href, true);
                $lot_info = $document2->first('.art-post-body')->first("#table_lot_{$lot_number}")->find('tr');
                $organizer_info = $document2->first('.art-post-body')->find('table')[0]->find('tr');
                $debtor_info = $document2->first('.art-post-body')->find('table')[2]->find('tr');
                $trading_info = $document2->first('.art-post-body')->find('table')[1]->find('tr');

                function findElement($items, $text)
                {
                    foreach ($items as $item) {
                        if (str_contains($item->text(), $text)) {
                            return str_replace($text, '', trim($item->text())).'<br>';
                        }
                    }
                }

                $description = findElement($lot_info,
                    'Cведения об имуществе (предприятии) должника, выставляемом на торги, его составе, характеристиках, описание') ?? '-';
                $start_price = findElement($lot_info, 'Начальная цена') ?? '-';
                $email = findElement($organizer_info, 'E-mail') ?? '-';
                $phone = findElement($organizer_info, 'Телефон') ?? '-';
                $inn = findElement($debtor_info, 'ИНН') ?? '-';
                $case_number = findElement($debtor_info, 'Номер дела о банкротстве') ?? '-';
                $auction_date = findElement($trading_info, 'Дата проведения') ?? '-';

// Запись в базу данных
                $duplicateQuery = $mysqli->prepare("SELECT id FROM lots WHERE trade_number = ?
                      AND lot_number = ? AND url = ? AND description = ? AND start_price = ?
                      AND email = ? AND phone = ? AND inn = ? AND case_number = ? AND auction_date = ?");
                $duplicateQuery->bind_param("sissdssiss", $trade_number, $lot_number,
                    $href, $description, $start_price, $email, $phone, $inn, $case_number,
                    $auction_date);
                $duplicateQuery->execute();
                $duplicateQuery->store_result();

                if ($duplicateQuery->num_rows > 0) {
                    echo "Такой лот уже есть в базе данных.<br>";
                } else {
                    $stmt = $mysqli->prepare("INSERT  INTO lots (id, trade_number, lot_number, url,
                            description, start_price, email, phone, inn, case_number, auction_date)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("isissdssiss", $id, $trade_number, $lot_number,
                        $href, $description, $start_price, $email, $phone, $inn, $case_number,
                        $auction_date);
                    $stmt->execute();
                    echo "Лот добавлен в базу данных.<br>";
                }
                break;
            } else {
                echo "Лот не найден.<br>";
                break;
            }
        }
    }
} else {
    echo "Таблица с данными не найдена.<br>";
}


