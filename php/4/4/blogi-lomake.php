<meta charset='UTF-8'>
<link type="text/css" rel="stylesheet" href="tyyli.css">
<title>Lisää Blogimerkintä</title>

<div id='container'>
<?php include("config-navbar.php")?>
<h2>Lisää Blogimerkintä</h2>

<div class="form-box">
<form action="blogi-talenna.php" method="post" enctype="multipart/form-data">
   Otsikko:<br>
  <input type="text" name="otsikko"><br>
  Merkintä:<br>
  <textarea cols="30" rows="4" name="merkinta"></textarea><br>
  Kuva:<br>
  <input type="file" name="image" id="fileToUpload"><br>
  <input type="submit" name="nappi" value="Tallenna"><br>
</form>
</div>