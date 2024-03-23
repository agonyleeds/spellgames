<?php
// mysqli_report(MYSQLI_REPORT_OFF);
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'spellgames_kp';
$link = new mysqli($hostname, $username, $password, $database);
$conf = $link->query("SELECT * FROM `config`");   
$config = [];
foreach ($conf as $key => $value) {
    $config[$value['name']] = $value['value'];
}
session_start();
?>