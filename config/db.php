<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

$config = parse_ini_file(BASE_PATH . '/config/config.ini', true);

$host = $config['database']['host'];
$db   = $config['database']['name'];
$user = $config['database']['user'];
$pass = $config['database']['pass'];

$conexao = new mysqli($host, $user, $pass, $db);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
$conexao->set_charset("utf8");