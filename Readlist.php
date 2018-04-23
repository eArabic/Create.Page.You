<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<?php
$e++; 
$str = str_replace( array('-', '_'), ' ', $page); 
$fileList = glob('Data/*');
foreach($fileList as $filename){
    $List = str_replace( array( 'Data/', '.html'), '', $filename ); 
     echo "<div class=\"container-fluid\">";
     echo   "<hr> <h1>".$e++."-".$List, '<a href="'.$filename.'">  Open  </a><h1></div> '; 
 
}
?>

<style>
    
</style>
