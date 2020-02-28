<?php

$config['Mailer'] = [
	'smtp_host' => "ssl://smtp.gmail.com",
	'smtp_SMTPSecure' => "ssl",
	'auth' => TRUE,
	'smtp_port' => 465,
	'smtp_username' => "vvv35353535",
	'smtp_pass' => "LoopLoop35",
	'from_name' => 'Виталий Викторович', // from (от) имя
	'from_email' => 'vvv35353535@gail.com', // from (от) email адрес
	'smtp_mode' => 'enabled', // enabled or disabled (включен или выключен)
//        'from_name' => 'Виталий Викторович', // from (от) имя
//        'from_email' => 'vvoronik@yandex.ru', // from (от) email адрес
//        'smtp_mode' => true, // enabled or disabled (включен или выключен)
//        'smtp_host' => "ssl://mail.vitexopt.ru",
//        'smtp_port' => 465,
//        'smtp_username' => "VVV_DIR",
];

if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == 'vitexopt.ru') {
	define('MODE', 'PROD');
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	ini_set('error_reporting', 0);
} else {
	define('MODE', 'DEV');
	define('ROOT', dirname(__DIR__));
	ini_set('display_errors', -1);
	ini_set('error_reporting', E_ALL);
};

return $config;
