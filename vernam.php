<?php

// Функция для генерации случайного ключа заданной длины
function generateKey($length) {
    $key = "";
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $charLen = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $key .= $characters[random_int(0, $charLen - 1)];
    }
    return $key;
}

// Функция для шифрования текста с использованием ключа
function encrypt($text, $key) {
    $encryptedText = "";
    $textLen = strlen($text);
    $keyLen = strlen($key);
    for ($i = 0; $i < $textLen; $i++) {
        $char = $text[$i];
        $charAscii = ord($char);
        $keyChar = $key[$i % $keyLen];
        $keyCharAscii = ord($keyChar);
        $encryptedCharAscii = ($charAscii + $keyCharAscii) % 256; // Арифметическая операция XOR
        $encryptedChar = chr($encryptedCharAscii);
        $encryptedText .= $encryptedChar;
    }
    return base64_encode($encryptedText); // Кодирование в base64
}

// Функция для дешифрования текста с использованием ключа
function decrypt($encryptedText, $key) {
    $decryptedText = "";
    $text = base64_decode($encryptedText); // Декодирование из base64
    $textLen = strlen($text);
    $keyLen = strlen($key);
    for ($i = 0; $i < $textLen; $i++) {
        $char = $text[$i];
        $charAscii = ord($char);
        $keyChar = $key[$i % $keyLen];
        $keyCharAscii = ord($keyChar);
        $decryptedCharAscii = ($charAscii - $keyCharAscii + 256) % 256; // Арифметическая операция XOR
        $decryptedChar = chr($decryptedCharAscii);
        $decryptedText .= $decryptedChar;
    }
    return $decryptedText;
}

// Пример использования

// Исходный текст для шифрования
$text = "Привет, Рассел Кроу!";
echo "Исходный текст: " . $text . "\n";

// Генерация случайного ключа
$key = generateKey(strlen($text));
echo "Ключ: " . $key . "\n";

// Шифрование текста
$encryptedText = encrypt($text, $key);
echo "Зашифрованный текст: " . $encryptedText . "\n";

// Дешифрование текста
$decryptedText = decrypt($encryptedText, $key);
echo "Дешифрованный текст: " . $decryptedText . "\n";

?>
