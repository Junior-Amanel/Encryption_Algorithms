<?php

function encrypt($message, $key) {
    $cipher = '';
    $message = strtolower($message);
    $alphabet = ' abcdefghijhklmnopqrstuvwxyz.,!\"£$%^&*()-+=';

    for($i = 0; $i < strlen($message); $i++) {
        $char = $message[$i];
        $position = strpos($alphabet, $char);
        $newPosition = ($position + $key) % strlen($alphabet);
        $newChar = $alphabet[$newPosition];
        $cipher .= $newChar;
    }

    return $cipher;
}

function decrypt($cipher, $key) {
    $message = '';
    $cipher = strtolower($cipher);
    $alphabet = ' abcdefghijhklmnopqrstuvwxyz.,!\"£$%^&*()-+=';

    for($i = 0; $i < strlen($cipher); $i++) {
        $char = $cipher[$i];
        $position = strpos($alphabet, $char);
        $newPosition = ($position - $key + strlen($alphabet)) % strlen($alphabet);
        $newChar = $alphabet[$newPosition];
        $message .= $newChar;
    }

    return $message;
}

// Пример использования
$message = 'in webdsday i sick! but in monday, i am feels good.';
$test_value='wrgdblvwxhvgdb';
$key = 3;

$cipher = encrypt($message, $key);
echo "Encrypted message: $cipher\n";

 $decryptedMessage = decrypt($cipher, $key);
 echo "Decrypted message: $decryptedMessage\n";

if($cipher == $test_value){
  echo "Chipher works good:$test_value";
}
?>
<!-- Этот код определяет две функции: encrypt() и decrypt().
Функция encrypt() принимает в качестве аргументов сообщение и ключ и возвращает зашифрованное сообщение.
Функция decrypt() принимает зашифрованное сообщение и ключ в качестве аргументов и возвращает расшифрованное сообщение.
