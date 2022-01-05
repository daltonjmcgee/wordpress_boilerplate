<?php

use WP_Filesystem_Base;

class Loaders {
  public static function requireAllFilesinDir(string $dir) {
    if (is_dir($dir)) {
      foreach (new DirectoryIterator($dir) as $fileInfo) {
        $fileName = $fileInfo->getfileName();

        // Checks for "Abstract" in filename, and for directory and parent directory
        // designations of ./ and ../
        if(!in_array($fileName, ['.', '..'], true)){
          require_once($fileInfo->getPathName());
          if (strpos(strtolower($fileName), "abstract") !== 0) {
            $className = explode('.', $fileName)[0];
            new $className();
          }
        }
      }
    }
    return;
  }
}
