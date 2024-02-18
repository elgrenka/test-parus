<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск лотов</title>
    <link rel="stylesheet" href="bootstrap-5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="container mt-4">
    <form class="mb-5" action="process.php" method="GET" target="_blank">
        <div class="mb-3">
            <label for="trade_number" class="form-label">Номер торгов:</label>
            <input type="text" class="form-control w-25" id="trade_number" name="trade_number" required>
        </div>
        <div class="mb-3">
            <label for="lot_number" class="form-label">Номер лота:</label>
            <input type="number" class="form-control w-25" id="lot_number" name="lot_number"
                   min="1" max="9999" required>
        </div>
        <button type="submit" class="btn btn-primary">Найти</button>
    </form>
    <table class="table table-bordered table-light table-hover table-responsive caption-top">
        <caption>Сохранённые лоты</caption>
        <thead>
        <tr class="table-info align-middle text-center">
            <th>Номер п/п</th>
            <th>URL адрес</th>
            <th>Описание лота</th>
            <th>Начальная цена</th>
            <th>Email конт. лица</th>
            <th>Телефон конт. лица</th>
            <th>ИНН должника</th>
            <th>Номер дела</th>
            <th>Дата торгов</th>
        </tr>
        </thead>
        <tbody>
        <?php include 'display_lots.php'; ?>
        </tbody>
    </table>
</div>
</body>
</html>

