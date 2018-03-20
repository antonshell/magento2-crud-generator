<?php

use src\FileService;

include '_bootstrap.php';
include '_config.php';

$config = require '_config.php';
$variables = require '_variables.php';

$service = new FileService();

$basePath = __DIR__ . '/template';
$outPath = $config['outPath'];


echo "disabled\n";
die();

$files = $service->getDirContents($basePath);

$service->recurseRmdir($outPath);
mkdir($outPath);

foreach ($files as $file){
    if(is_dir($file)){
        $file = str_replace($basePath,'', $file);
        $file = $outPath . $file;

        echo $file . "\n";

        $file = $service->processFileName($file,$variables);

        if(!file_exists($file)){
            mkdir($file,0777,true);
        }
    }
}

foreach ($files as $file){
    if(is_dir($file)){
       continue;
    }

    $content = file_get_contents($file);

    $file = str_replace($basePath,'', $file);
    $file = str_replace('_inc','', $file);

    $file = $service->processFileName($file,$variables);


    $file = $outPath . $file;

    $path = dirname($file);

    $content = $service->processContent($content,$variables);

    file_put_contents($file,$content);
}


echo "Job is done\n";
