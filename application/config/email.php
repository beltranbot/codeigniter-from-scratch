<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = [
    'protocol' => 'smtp',
    'mailtype' => 'html',
    'smtp_host' => 'smtp.sendgrid.net',
    'smtp_user' => 'apikey',
    'smtp_pass' => '<your-api-key-here>',
    'smtp_port' => 587,
    'crlf' => "\r\n",
    'newline' => "\r\n",
];
