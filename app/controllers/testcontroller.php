<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Validate;

class TestController extends AbstractController
{
    use Validate;
    public function defaultAction()
    {


        $this->language->load('template.common');

        $encrypted = password_hash('encryptedKey', CRYPT_BLOWFISH);
        var_dump($encrypted);

        $this->_view();
    }

}