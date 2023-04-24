<?php

// Функция для выполнения частотного анализа текста
function frequencyAnalysis($text) {
    $text = strtoupper($text); // Приведение текста к верхнему регистру
    $text = preg_replace("/[^A-Z]/", "", $text); // Удаление всех символов, кроме букв английского алфавита
    $textLen = strlen($text);
    $letterCounts = array();
    for ($i = 0; $i < $textLen; $i++) {
        $char = $text[$i];
        if (isset($letterCounts[$char])) {
            $letterCounts[$char]++;
        } else {
            $letterCounts[$char] = 1;
        }
    }
    arsort($letterCounts); // Сортировка массива по убыванию частот
    return $letterCounts;
}

// Пример использования

// Исходный текст для анализа
$text = "heloo world!";
echo "Исходный текст: " . $text . "\n";

// Выполнение частотного анализа
$letterCounts = frequencyAnalysis($text);

// Вывод результатов
echo "Результаты частотного анализа:\n";
foreach ($letterCounts as $letter => $count) {
    echo $letter . ": " . $count . "\n";
}

?>
