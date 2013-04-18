<?php

    $result = "";
    //counter to not wait forever
    $counter = 0;
    $downloadFolder = __DIR__ . '/../../downloads';
    do {
        if ($counter >= 10) {
            $result = "Error";
            break;
        }
        sleep(5000);
        if (!file_exists($downloadFolder)) {
            $di = mkdir($downloadFolder);
        }
        $filePaths = opendir($downloadFolder);
        while (($file = readdir($filePaths)) !== false) {
            $name = $file;
        }
        closedir($filePaths);
        if ($name == "") {
            $counter++;
            continue;
        } else {
            $result = $name; //get the name of the fist file in the directory
            break;
        }
    } while (true);
    if ($result == "Error") {
         return "File was not found. Looks like something went wrong.";
    }
    return $result;
?>
