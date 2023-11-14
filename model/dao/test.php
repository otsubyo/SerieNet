<?php

$text = "9wms351v";
function decoder($text, $key): string
{
    $key_len = strlen($key);
    $key_idx = 0;
    $plaintext = "";

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        if (ctype_alpha($char)) {
            $shift = ord(strtolower($key[$key_idx])) - 97;
            $new_char = chr(((ord(strtolower($char)) - 97 - $shift + 26) % 26) + 97);
            $key_idx = ($key_idx + 1) % $key_len;
        } else {
            $new_char = $char;
        }

        $plaintext .= $new_char;
    }
    return $plaintext;
}

echo decoder($text, "thou");
echo php_uname('n');


