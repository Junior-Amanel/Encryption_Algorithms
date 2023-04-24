<?php
function trithemius_encrypt($text, $key)
{
    $cipher = '';
    $text = strtolower(preg_replace('/[^a-z]/', '', $text)); 
    $key = strtolower(preg_replace('/[^a-z]/', '', $key)); 
    $keyLen = strlen($key);
    
    for ($i = 0; $i < strlen($text); $i++) {
        $shift = ord($key[$i % $keyLen]) - 97;
        $cipher .= chr((ord($text[$i]) - 97 + $shift) % 26 + 97);
    }
    
    return $cipher;
}

function trithemius_decrypt($cipher, $key)
{
    $text = '';
    $cipher = strtolower(preg_replace('/[^a-z]/', '', $cipher)); 
    $key = strtolower(preg_replace('/[^a-z]/', '', $key)); 
    $keyLen = strlen($key);
    
    for ($i = 0; $i < strlen($cipher); $i++) {
        $shift = ord($key[$i % $keyLen]) - 97; 
        $text .= chr((ord($cipher[$i]) - 97 - $shift + 26) % 26 + 97); 
    }
    
    return $text;
}

// пример использования
$text = 'anduin lothar';
$key = 'secret';
$cipher = trithemius_encrypt($text, $key);
echo 'Trithemius cipher: ' . $cipher . '<br>';
$decrypted = trithemius_decrypt($cipher, $key);
echo 'Decrypted text: ' . $decrypted;
?>
