<html>
  <head>
    <title>TextPaste
    </title>
  </head>
  <body>
    <h1>TextPaste
    </h1>
    <p>A simple way to create and share .txt files. Coded by internetperson.
    </p>
    <form method="post" action="">
      <textarea type="text" name="typed" value="<?= isset($_POST['typed']) ? htmlspecialchars($_POST['typed']) : '' ?>"></textarea>
      </br>
    <input type="submit" value="Paste!" />
    </form>
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
if (! is_dir ("TXT/")) {
mkdir ("TXT/", '0777' );
chmod("TXT/",0777);
}
if(isset($_POST['typed'])) {
$dir="TXT/";   
$my_file = $dir.$rand.'.txt';
$handle = fopen($my_file, 'w') or die('Cannot open file: '.$my_file);
$txt = htmlspecialchars($_POST['typed']);
$arabic = pack("CCC",0xef,0xbb,0xbf) .$txt;
fwrite($handle, $arabic);
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/'.$my_file;
echo "<br><span><a href='".$home_url."'>Link Latest File You Created</a></span></p>";
}
?>
