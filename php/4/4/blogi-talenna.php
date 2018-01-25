<meta charset='UTF-8'>
<link type="text/css" rel="stylesheet" href="tyyli.css">
<title>Lisää Blogimerkintä</title>

<div id='container'>
<?php include("config-navbar.php")?>
<h2>Tallensit Blogimerkintä</h2>
    
<?php 
$blogimerkinta = '';
// blogi.php
$aikaleima = date("Y-m-d--H-i-s");
define("BLOGI_FILE", "$datadir/$aikaleima.txt");
    
$kuva = "images/" . basename($_FILES["image"]["name"]);
$imageFileType = pathinfo($kuva,PATHINFO_EXTENSION);

    
// Lisätään viesti
if(isset($_POST['nappi'])) {
  if (!$fp = @fopen(BLOGI_FILE, "w"))
     {echo "fopen virhe!"; exit();}
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    unlink("$datadir/$aikaleima.txt");
  }
  
  else {
    $kuva = "images/$aikaleima." . $imageFileType;
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $kuva)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded."; }
      
    // Valmistellaan merkintä
    $_POST['merkinta'] = nl2br($_POST['merkinta']);

  $blogimerkinta = <<<BLOGIMERKINTA
  <h4>{$_POST['otsikko']}</h4>
  <p>{$_POST['merkinta']} $imageFileType</p>
  <img src=$kuva width=200 height=100>
BLOGIMERKINTA;
      
  //Kirjoitetaan merkintä tiedostoon
  fwrite($fp, $blogimerkinta);
  fclose($fp);
    }
}
    

    
echo $blogimerkinta;
    
?>

</div>