<?php

require_once 'database.php';
require_once 'lib.php';

$sql = 'SELECT * FROM `words` ORDER BY rand() LIMIT 5';
$stmt = $pdo->query($sql);
$words = $stmt->fetchAll();

$num_check = rand(0, 4);

$length_test = 5;

//statistics test
$show_words = isset($_GET['show']) ? $_GET['show'] + 1 : 1;
$remain_words = $length_test - $show_words;
$num_answers = isset($_GET['answers']) ? $_GET['answers'] : 0;

if($_GET['show'] == $length_test) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/report_test.php?show=".$_GET['show']."&answers=".$num_answers);
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/check_word.js"></script>
    <title>English</title>
</head>
<body>
<div class="conteiner">
    <h1>Проверка знаний английских слов</h1>
     <table class="main-table">
        <tr>
            <td class="table-title">English</td>
            <td class="table-title">Russian</td>
        </tr>
        <?php
            printf('<tr>
                        <td rowspan="5" id="word_check" id_check="%d" class="rus">%s</td>
                        <td class="eng"><input type="radio" name="eng" id_word="%d">%s</td>
                    </tr>',$words[$num_check]['id'], $words[$num_check]['eng'], $words[0]['id'], $words[0]['rus']);
            for ($i = 1, $count = count($words); $i < $count; $i++) {
                    printf('<tr><td class="eng"><input type="radio" name="eng" id_word="%d">%s</td></tr>',$words[$i]['id'], $words[$i]['rus']);
            }
        ?>
     </table>
    <table class="test-info">
        <tr>
            <th colspan="2">Статистика теста</th>
        </tr>
        <tr>
            <td>Слов показано</td>
            <td id="info_show_words"><?=$show_words?></td>
        </tr>
        <tr>
            <td>Слов осталось</td>
            <td><?=$remain_words?></td>
        </tr>
        <tr>
            <td>Кол-во попыток</td>
            <td id="info_answers"><?=$num_answers?></td>
        </tr>
    </table>
    <a class="button" href="index.php">Начать заново</a>
</div>
</body>
</html>

