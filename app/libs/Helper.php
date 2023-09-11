<?php

namespace Adso\libs;

class  Helper
{
    function __construct()
    {
    }

    public static function encrypt($data)
    {
        $key = base64_decode(MASTER);
        $ib = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-cbc"));
        $string = openssl_encrypt($data, "aes-256-cbc", $key, 0, $ib);
        return base64_encode($string . "::" . $ib);
    }

    public static function decrypt($data)
    {
        $key = base64_decode(MASTER);
        $ib = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-cbc"));
        list($string, $ib) = array_pad(explode("::", base64_decode($data), 2), 2, null);
        return openssl_decrypt($string, "aes-256-cbc", $key, 0, $ib);
    }
}
