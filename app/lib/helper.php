<?php


namespace PHPMVC\LIB;


trait Helper
{
    public function redirect($path)
    {
        session_write_close();

        header('Location: ' . $path);
        exit;

    }

    public function flashMsg($status, $msg)
    {
        $_SESSION['status'] = $status;
        $_SESSION['msg'] = $msg;
    }
}