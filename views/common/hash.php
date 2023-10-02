<?php
function derivateKey($password, $salt, $iterations, $keyLengthBits)
{
    return hash_pbkdf2(
        'sha256',
        $password,
        $salt,
        $iterations,
        $keyLengthBits / 8,
        true
    );
}
function generateSalt(){
    return random_bytes(32);
}