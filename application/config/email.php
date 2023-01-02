<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'useragent' => 'CodeIgniter',
    'protocol'  => 'smtp',
    'mailpath'  => '/usr/sbin/sendmail',
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'ali.nurdiansah85@gmail.com',
    'smtp_pass' => 'L1e4ndf4',
    'smtp_keepalive' => TRUE,
    'smtp_crypto' => 'SSL',
    'wordwrap'  => TRUE,
    'wrapchars' => 80,
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'validate'  => TRUE,
    'crlf'      => "\r\n",
    'newline'   => "\r\n"
);