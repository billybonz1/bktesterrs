<?php
function scanDirr($target) {
    if(is_dir($target)){
        $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

        foreach( $files as $file )
        {
            if(strpos($file,"node_modules") === FALSE){
                scanDirr( $file );
                $fileArr = explode(".",$file);
                if(end($fileArr) == "php" || end($fileArr) == "html" || end($fileArr) == "htm" || end($fileArr) == "js"){
                    $content = file_get_contents($file);
                    echo $file."\n";
                    echo mb_detect_encoding($content);
                    // if(mb_detect_encoding($content) == "UTF-8"){
                    //     echo mb_detect_encoding($content)."\n";
                    //     echo $file."\n";
                    //     $content = file_get_contents($file);
                    //     $content = mb_convert_encoding($content, "utf-8", "windows-1251");
                    //     $file_handle = fopen($file, 'w');
                    //     fwrite($file_handle, $content);
                    //     echo fclose($file_handle);
                    // }


                }
            }
        }
    }
}
scanDirr("./");