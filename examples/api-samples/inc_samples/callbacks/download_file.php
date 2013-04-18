<?php

$file = (dirname(__FILE__) . '/../../downloads/' . $_GET["FileName"]);
header ("Content-Type: application/octet-stream");
header ("Accept-Ranges: bytes");
header ("Content-Length: ".filesize($file));
header ("Content-Disposition: attachment; filename=".$_GET["FileName"]);  
readfile($file);
?>
