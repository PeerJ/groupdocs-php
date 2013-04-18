<?php

$file = (__DIR__ . '/../../downloads/' . $_POST["FileName"]);
header ("Content-Type: application/octet-stream");
header ("Accept-Ranges: bytes");
header ("Content-Length: ".filesize($file));
header ("Content-Disposition: attachment; filename=".$file);  
readfile($file);
?>
