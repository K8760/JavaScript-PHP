<meta charset='UTF-8'>
<style type='text/css'>
body {font: 100% arial, helvetica, sans-serif;}
h2, h3 {background-color:#e7ecf1; text-align: center} 
#container {width: 400px; margin-left:auto; margin-right:auto;}
h4, p {padding: 0.1em; margin: 0.1em;}
.merkinta, .form-box {
background-color: #f1f1f1; border: 1px solid #e5e5e5;}
.merkinta {padding: 0.2em; margin-bottom: 0.3em;}
.form-box {padding: 10px 0px 10px 25px;}
</style>

<title>Blogi</title>
<div id='container'>

<h2>Blogi</h2>

<div class="form-box">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
   Otsikko:<br>
  <input type="text" name="otsikko"><br>
  Merkintä:<br>
  <textarea cols="30" rows="4" name="merkinta"></textarea><br>
  <input type="submit" name="nappi" value="Tallenna">
</form>
</div>


<?php
// blogi.php

define("BLOGI_FILE", "data/blogidata.txt");

// Lisätään viesti
if(isset($_GET['nappi'])) {
    $vanhafile = @file_get_contents(BLOGI_FILE);
  if (!$fp = @fopen(BLOGI_FILE, "w"))
     {echo "fopen virhe!"; exit();}

  // Valmistellaan merkintä
  $_GET['merkinta'] = nl2br($_GET['merkinta']);

  $blogimerkinta = <<<BLOGIMERKINTA
  <div class='merkinta'>
  <h4>{$_GET['otsikko']}</h4>
  <p>{$_GET['merkinta']}</p>
  </div>
BLOGIMERKINTA;

  //Kirjoitetaan merkintä tiedostoon
  fwrite($fp, $blogimerkinta);
  fwrite($fp, $vanhafile);
  fclose($fp);
}
?>

<h3>Blogimerkinnät</h3>
<?php @include(BLOGI_FILE) ?>
</div>