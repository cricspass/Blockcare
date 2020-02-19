<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpseclib\Crypt\RSA;

class KeysController extends Model
{
    static public function generate_keys() {
        $rsa = new RSA();
        $rsa->setPrivateKeyFormat(RSA::PRIVATE_FORMAT_PKCS1);
        $rsa->setPublicKeyFormat(RSA::PUBLIC_FORMAT_PKCS1);
        $rsa->setHash('sha256');
        $rsa->setComment('ivub');
        $key_pair = $rsa->createKey(1024);
        return $key_pair;
    }
}
