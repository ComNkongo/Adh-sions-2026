<?php
define('SECRET_KEY', 'Nkongo-Secret-Key-2025');
define('SECRET_IV', 'Nkongo-IV-2025');

function encryptData($data) {
    return openssl_encrypt($data, "AES-256-CBC", SECRET_KEY, 0, substr(hash('sha256', SECRET_IV),0,16));
}

function decryptData($data) {
    return openssl_decrypt($data, "AES-256-CBC", SECRET_KEY, 0, substr(hash('sha256', SECRET_IV),0,16));
}
