<?php

require_once 'database.php';
require_once 'lib.php';
require_once 'HendlerFile.php';

$sql = 'SELECT * FROM `words` ORDER BY rand() LIMIT 5';
$stmt = $pdo->query($sql);
$words = $stmt->fetchAll();

$num_check = rand(0, 4);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/check_word.js"></script>
    <title>Englesh</title>
</head>
<body>
<div class="conteiner">
    <h1>Проверка знаний английских слов</h1>
     <table>
        <tr>
            <td class="table-title">English</td>
            <td class="table-title">Russian</td>
        </tr>
        <?php
            printf('<tr>
                        <td rowspan="5" id="word_check" id_check="%d" class="rus">%s</td>
                        <td><input type="radio" name="eng" id_word="%d">%s</td>
                    </tr>',$words[$num_check]['id'], $words[$num_check]['rus'], $words[0]['id'], $words[0]['eng']);
            for ($i = 1, $count = count($words); $i < $count; $i++) {
                printf('<tr><td><input type="radio" name="eng" id_word="%d">%s</td></tr>',$words[$i]['id'], $words[$i]['eng']);
            }
        ?>
     </table>
    <!-- <input type="text" name="" id="" value="показать"> -->
</div>
</body>
</html>


