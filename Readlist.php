<?php
$fileList = glob('Data/*');
$str = str_replace( array('-', '_'), ' ', $page); 
$fileList = glob('Data/*');
foreach($fileList as $filename){
    $List = str_replace( array( 'Data/', '.html'), '', $filename ); 
    echo "<hr>".$List, '<br><h1><a href="'.$filename.'">  Open  </a><h1> '; 
 
}
?>
