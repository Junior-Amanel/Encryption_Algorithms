<?php
function vigenereEncrypt($text, $key) {
    $text = strtoupper($text);
    $key = strtoupper($key);
    $lenText = strlen($text);
    $lenKey = strlen($key);
    $result = '';

    for ($i = 0; $i < $lenText; $i++) {
        $charText = ord($text[$i]) - 65;
        $charKey = ord($key[$i % $lenKey]) - 65;
        $charEncrypted = ($charText + $charKey) % 26 + 65;
        $result .= chr($charEncrypted);
    }

    return $result;
}

function vigenereDecrypt($text, $key) {
    $text = strtoupper($text);
    $key = strtoupper($key);
    $lenText = strlen($text);
    $lenKey = strlen($key);
    $result = '';

    for ($i = 0; $i < $lenText; $i++) {
        $charText = ord($text[$i]) - 65;
        $charKey = ord($key[$i % $lenKey]) - 65;
        $charDecrypted = ($charText - $charKey + 26) % 26 + 65;
        $result .= chr($charDecrypted);
    }

    return $result;
}

$text = 'elevensdistrictisgoodplace';
$key = 'endgame';

$test=strtoupper('iyhbezwhvvzrugxvvmoahtydie');


$encrypted = vigenereEncrypt($text, $key);
echo "Encrypted: $encrypted\n"; 

$decrypted = vigenereDecrypt($encrypted, $key);
echo "Decrypted: $decrypted\n"; 

if($test == $encrypted){
    echo "Chipher works good:$test";
  }

?>