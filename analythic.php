<?php
// Функция для шифрования текста с использованием аналитических преобразований
function encryptText($text, $key) {
    // Переводим текст и ключ в массивы символов
    $text = str_split($text);
    $key = str_split($key);
    $encryptedText = '';
    
    // Проходим по каждому символу текста
    for ($i = 0; $i < count($text); $i++) {
        // Применяем аналитическое преобразование на основе ключа
        $encryptedChar = chr(ord($text[$i]) + ord($key[$i % count($key)]));
        
        // Добавляем зашифрованный символ в зашифрованный текст
        $encryptedText .= $encryptedChar;
    }
    
    // Кодируем зашифрованный текст в base64
    $encryptedText = base64_encode($encryptedText);
    
    // Возвращаем зашифрованный текст
    return $encryptedText;
}

// Функция для расшифровки текста с использованием аналитических преобразований
function decryptText($encryptedText, $key) {
    // Декодируем зашифрованный текст из base64
    $encryptedText = base64_decode($encryptedText);
    
    // Переводим зашифрованный текст и ключ в массивы символов
    $encryptedText = str_split($encryptedText);
    $key = str_split($key);
    $decryptedText = '';
    
    // Проходим по каждому символу зашифрованного текста
    for ($i = 0; $i < count($encryptedText); $i++) {
        // Применяем аналитическое преобразование на основе ключа
        $decryptedChar = chr(ord($encryptedText[$i]) - ord($key[$i % count($key)]));
        
        // Добавляем расшифрованный символ в расшифрованный текст
        $decryptedText .= $decryptedChar;
    }
    
    // Возвращаем расшифрованный текст
    return $decryptedText;
}

// Пример использования функций для шифрования и расшифровки текста
$text = "Hello, world!";
$key = "my_key";

echo "Исходный текст: " . $text . "\n";
echo "Ключ: " . $key . "\n";

$encryptedText = encryptText($text, $key);
echo "Зашифрованный текст: " . $encryptedText . "\n";

$decryptedText = decryptText($encryptedText, $key);
echo "Расшифрованный текст: " . $decryptedText . "\n";

// В функции encryptText(), в строке $encryptedChar = chr(ord($text[$i]) + ord($key[$i % count($key)]));, где происходит сложение символа из исходного текста с символом из ключа, и результат записывается в переменную $encryptedChar. Если один из символов равен пробелу, то сложение символов также может создать пробел.
// В функции decryptText(), в строке $decryptedChar = chr(ord($encryptedText[$i]) - ord($key[$i % count($key)]));, где происходит вычитание символа из зашифрованного текста с символом из ключа, и результат записывается в переменную $decryptedChar. Если один из символов равен пробелу, то вычитание символов также может создать пробел.
?>