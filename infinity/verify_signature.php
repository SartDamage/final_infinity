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

$recievedJwt =$_GET['JIT'];

$secret_key = 'Octaviasecretkey';

// Split a string by '.' 
$jwt_values = explode('.', $recievedJwt);

// extracting the signature from the original JWT 
$recieved_signature = $jwt_values[2];
// concatenating the first two arguments of the $jwt_values array, representing the header and the payload
$recievedHeaderAndPayload = $jwt_values[0] . '.' . $jwt_values[1];;
// creating the Base 64 encoded new signature generated by applying the HMAC method to the concatenated header and payload values
$resultedsignature = Base64Url::encode(hash_hmac('sha256',$recievedHeaderAndPayload, $secret_key, true));
// checking if the created signature is equal to the received signature
if($resultedsignature == $recieved_signature) {

	// If everything worked fine, if the signature is ok and the payload was not modified you should get a success message
	echo "\nSuccess";
}else{echo "\nFailure";}
?> 