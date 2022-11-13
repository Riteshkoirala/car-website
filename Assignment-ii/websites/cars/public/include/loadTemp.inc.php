<?php
//function to load the templete
function loadTemplate($fileName, $first, $second) {
    ob_start();
    require $fileName;
    $contents = ob_get_clean();
    return $contents;
   }

?>