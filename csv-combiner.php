<?php

    function joinFiles(array $files) {
        if(!is_array($files)) {
            throw new Exception("argument `$files` must be an array.");
        }
        echo "\""."email_hash"."\"".","."\""."category"."\"".","."\""."filename"."\""."\n";
        foreach ($files as $file) {
            $row = 1;
            $fileName = basename($file);
            if(($fh = fopen($file, 'r')) !== FALSE) {
               while (($data = fgetcsv($fh, null, ",")) !== FALSE) {
                if ($row == 1) {
                    $row++;
                    continue;
                }
                $num = count($data);
                for ($i = 0; $i < $num; $i++) {
                    echo "\"".$data[$i]."\"".",";
                }
                echo "\"".$fileName."\""."\n";
               }
            } else {
                $errorMessage = "file is not found";
                echo $errorMessage;
            }
        }
    }

    $filesLength = $argc - 1;
    $files = array_slice($argv, 1, $filesLength, false);
    joinFiles($files);
    
?>