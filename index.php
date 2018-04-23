<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<html>
  <head>
    <title>TextPaste
    </title>
  </head>
  <body>
    <br>
    <div class="container-fluid">
      <h1>TextPaste
      </h1>
      <br>
      <p>A simple way to create and share (HTML) files. Coded by internetperson.
      </p> 
      <form method="post" action="">
        <textarea type="text" name="typed" value="<?= isset($_POST['typed']) ? htmlspecialchars($_POST['typed']) : '' ?>">...</textarea>
        </br>
        <label>Name Page You</label><br>
      <input type="text" value="NamePageYou"  name="Page"/> <br>
     <br><input type="submit" name="submit" value="Paste!" />
    </form>
  </div>
<style>
  form{
    font-size: 1.5em;
    margin: auto;
    padding: 12px;
    line-height: 1.55;
    text-align: center;
    background: #F5F5F5;
  }
  textarea{
    font-size: 1.5em;
    margin: auto;
    padding: 12;
    line-height: 1.55;
    width: 95%;
    margin-bottom: 12px;
    text-align: justify;
    border: #2196F3 solid 1px;
  }
  h1 {
    text-align: center;
    margin: auto;
    padding: 12px;
    background: #eaf1f7;
    color: #1976D2;
  }
  p{
    text-align: center;
    margin: auto;
    padding: 5px;
    background: #4CAF50;
    color: #FAFAFA;
    font-size: 1.25em;
  }
  span {
    text-align: center;
    margin: auto;
    padding: 12px;
    font-size: 1.5em;
    display: inherit;
    background: #DCEDC8;
  }
  a {
    text-decoration: none;
    color: #F44336;
    font-weight: bold;
  }
</style>
<?php
function strReplaceArabic($subject)
{
$replace = array(
'#0#' => "<p>",
'#00#' => "</p>",
'#1#' => "<h2>",
'#11#' => "</h2>",            
'#2#' => "<strong>",
'#22#' => '</strong>',
'#3#' => '<hr>',
'#4#' => '<br>',
'#5#' => '<img src="',  
'#55#' => '">',
'#6#' => '<center>',
'#7#' => '<title>',
'#77#' => '</title>',   
'#8#' => '<h1>',
'#88#' => '</h1>',
'#9#' => '<a href="',
'#99#' => '">',
'#999#' => '</a>',
'#@#' => '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
'
);
return str_replace(array_keys($replace), array_values($replace), $subject);
}
/////////////////////////
function generateRandomString($length = 12) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}
$rand = generateRandomString();
if (! is_dir ("Data/")) {
mkdir ("Data/", '0777' );
chmod("Data/",0777);
}
$dir="Data/"; 
$phpadd = "
<?php
include_once  'php.php';
include 'style.php';
?> ";
$exe=".html";
$randPage=strip_tags( $_POST["Page"]);
$last=$dir.$randPage.$exe;
if($_POST["submit"]) {
if (file_exists($last)) {
echo "
<h2 
     class=\"alert alert-danger\">The File ($randPage) already exists
</h2>
";
} else {
$my_file = $dir.$randPage.'.html';
$handle = fopen($my_file, 'w') or die('Cannot open file: '.$my_file);
$txt = htmlspecialchars($_POST['typed']);
$arabic = pack("CCC",0xef,0xbb,0xbf) .$txt;
$end=strReplaceArabic($arabic);
fwrite($handle, $end);
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/'.$my_file;
echo "
<br>
<span 
class=\"alert alert-success\">
<a href='".$home_url."'>Link Latest File You Created
</a>
</span>
</p>";
#header("location:". $home_url);
}
}  
?>
