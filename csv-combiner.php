<?php

    function joinFiles(array $files) {
        if(!is_array($files)) {
            throw new Exception("argument \$files must be an array.");
        }
        echo "\""."email_hash"."\"".","."\""."category"."\"".","."\""."filename"."\""."\n";
        foreach ($files as $file) {
            $row = 1;
            if (!file_exists($file)) {
                throw new Exception("File not found.");
            }
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
                throw new Exception("File open failed");
            }
            fclose($fh);
        }
    }

    try {
        $filesLength = $argc - 1;
        $files = array_slice($argv, 1, $filesLength, false);
        joinFiles($files);
    }
    catch (Exception $e) {
        echo "Error Message: ".$e->getMessage();
    }
    
?>