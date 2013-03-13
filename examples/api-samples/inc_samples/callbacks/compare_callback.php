<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svarog
 * Date: 01.02.13
 * Time: 9:15
 * To change this template use File | Settings | File Templates.
 */
 
$json = file_get_contents("php://input");
$fp = fopen(__DIR__ . '/../../temp/compare_request_log.txt', 'a');
fwrite($fp, $json . "\r\n");

fclose($fp);