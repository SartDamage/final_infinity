<?php
/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2018 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */
namespace Base64Url;
/**
 * Encode and decode data into Base64 Url Safe.
 */
final class Base64Url
{
    /**
     * @param string $data        The data to encode
     * @param bool   $use_padding If true, the "=" padding at end of the encoded value are kept, else it is removed
     *
     * @return string The data encoded
     */
    public static function encode($data, $use_padding = false)
    {
        $encoded = strtr(base64_encode($data), '+/', '-_');
        return true === $use_padding ? $encoded : rtrim($encoded, '=');
    }
    /**
     * @param string $data The data to decode
     *
     * @return string The data decoded
     */
    public static function decode($data)
    {
        return base64_decode(strtr($data, '-_', '+/'));
    }
}
?>
<?php

$key = 'Octaviasecretkey';

$header = [
           'typ' => 'JWT',
		   'alg' => 'HS256'
		  ];

$header = json_encode($header);

$header = Base64Url::encode($header);


$payload = [      
		"Username" => "Yam karki",
		"email" => "yamkkarki@gmail.com"
		  ];

$payload = json_encode($payload);

$payload = Base64Url::encode($payload);

// Generates a keyed hash value using the HMAC method

$header_payload = $header . '.' . $payload;
//base64 encode the signature create
$signature = Base64Url::encode(hash_hmac('sha256',$header_payload, $key, true));



//concatenating the header, the payload and the signature to obtain the JWT token
$token = "$header.$payload.$signature";
echo "$token\n";
$resultedsignature = hash_hmac('sha256',$header_payload, $key, true);
$resultedsignature = Base64Url::encode($resultedsignature);

// checking if the created signature is equal to the received signature
if($resultedsignature == $signature) {

	// If everything worked fine, if the signature is ok and the payload was not modified you should get a success message
	echo "<a href='/verify_signature.php?JIT=$token'>Click to reset Password</a>";
}else{echo "Username dosent match try again";}

?> 
