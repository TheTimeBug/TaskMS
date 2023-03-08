<?php
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$PrivateKey_key = "wkt567r";
function encrypt($text){
    $encryption = openssl_encrypt($text, $GLOBALS['ciphering'],
    $GLOBALS['PrivateKey_key'], $GLOBALS['options'], $GLOBALS['encryption_iv']);
    return $encryption;
}
?>