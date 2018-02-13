<?php

namespace src;

/**
 * Class FileService
 * @package src
 */
class FileService
{
    /**
     * @param $dir
     * @param array $results
     * @return array
     */
    public function getDirContents($dir, &$results = array()){
        $files = scandir($dir);

        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            } else if($value != "." && $value != "..") {
                $this->getDirContents($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }

    /**
     * @param $dir
     * @return bool
     */
    function recurseRmdir($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->recurseRmdir("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

    /**
     * @param $content
     * @param $variables
     * @return mixed
     */
    public function processContent($content,$variables)
    {
        foreach($variables as $key => $value){
            $content = str_replace('{{{'.strtolower($key).'}}}', $value, $content);
        }

        return $content;
    }

    /**
     * @param $file
     * @param $variables
     * @return mixed
     */
    public function processFileName($file, $variables)
    {
        foreach($variables as $key => $value){
            $file = str_replace('___'.strtolower($key).'___', $value, $file);
        }

        return $file;
    }
}