<?php

    foreach($myfiles as $file){
        echo '<a href="/index.php/upload/fileinfo/'.$file->ID.'" >'.$file->filename.'</a>';
        echo '<br />';
    }

?>
