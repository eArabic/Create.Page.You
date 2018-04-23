<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<?php
$fileList = glob('Data/*');
$str = str_replace( array('-', '_'), ' ', $page); 
$fileList = glob('Data/*');
foreach($fileList as $filename){
    $List = str_replace( array( 'Data/', '.html'), '', $filename ); 
    echo "<hr>".$List, '<br><h1><a href="'.$filename.'">  Open  </a><h1> '; 
 
}
?>

<style>
    
</style>
