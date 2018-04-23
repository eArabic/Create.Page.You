<?php
$fileList = glob('Data/*');
foreach($fileList as $filename){
    echo '<hr><a href="'.$filename.'">  Open File  </a> ';
   echo $filename, '<br>'; 
}
?>
