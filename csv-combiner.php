<?php

function joinFiles(array $files) {
    if(!is_array($files)) {
        throw new Exception("argument \$files must be an array.");
    }
    $fileCount = 1;
    foreach ($files as $file) {
        $row = 1;
        if (!file_exists($file)) {
            throw new Exception("File not found.");
        }
        $fileName = basename($file);
        if(($fh = fopen($file, 'r')) !== FALSE) {
           while (($data = fgetcsv($fh, null, ",")) !== FALSE) {
            $num = count($data);
            if ($row == 1 && $fileCount == 1) {
                for ($i = 0; $i < $num; $i++) {
                    echo "\"".$data[$i]."\"".",";
                }
                echo "\"filename\""."\n";
                $fileCount++;
                $row++;
                continue;
            }
            if ($row == 1 && $fileCount != 1) {
                $row++;
                continue;
            }
            for ($i = 0; $i < $num; $i++) {
                echo "\"".$data[$i]."\"".",";
            }
            echo "\"".$fileName."\""."\n";
           }
        } else {
            throw new Exception("File open failed");
        }
        fclose($fh);
    }
}

try {
    global $argc, $argv;
    $filesLength = $argc - 1;
    $files = array_slice($argv, 1, $filesLength, false);
    joinFiles($files);
}
catch (Exception $e) {
    echo "Error Message: ".$e->getMessage();
}

?>