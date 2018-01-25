<?php
$serverpath = dirname($_SERVER['SCRIPT_FILENAME']);
$datapath = "/data/";
$datadir = "$serverpath" . "$datapath";
$filename = "$datadir" . "aanet.txt";
 
/* Alkumuodollisuudet */
do_header();
 
lomake();
$aanet = lue_tulokset($filename);
if (isset($_POST['aani']))
{
   lisaa_ja_kirjoita_tulokset($filename, $aanet, $_POST['aani']);
}
esita_tulokset($aanet);
 
do_footer();
 
/*****************************************************************************/
/*********************************ALIOHJELMAT*********************************/
/*****************************************************************************/
 
/* ------------------------------------------------------------------------ */
/*
* Alkumuodollisuudet
*/
function do_header() {
    echo "<html><head>
<meta http-equiv='content-type' content='text/html; charset=UTF-8'>\n" .
         "<title>Harjoitukset 10 / Tehtävä 1 / Äänestys</title>" .
         "</head>\n" .
         "<body>\n" .
         "<h3>Äänestä lempiruokaa</h3>\n";
}
 
/* ------------------------------------------------------------------------ */
/*
* Loppumuodollisuudet
*/
function do_footer() {
    echo "</body>\n" .
         "</html>\n";
}
 
/* ------------------------------------------------------------------------ */
/*
* Syöttölomake, huomaa aani-datan mahdolliset arvot: 0, 1, 2.
*/
function lomake() {
?>
   <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
   <input type="radio" name="aani" value="0" checked>
          Pinaatti</input><br>
   <input type="radio" name="aani" value="1">
          Salaatti</input><br>
   <input type="submit" value="Äänestä">
   </form>
<?php
}
 
/* ------------------------------------------------------------------------ */
/*
* Lue olemassaolevat tulokset. Tiedoston dataformaattina yksi rivi, jossa
* kolme kokonaislukua on erotettu toisistaan tabulaattorein
*/
 
function lue_tulokset($filename)
{    
    $fp = fopen("$filename", "r+");
 
    /* $aanet[0] <- Pinaatin lkm, $aanet[1] <- Salaatin lkm ... */
    $aanet = fscanf($fp, "%d\t%d");
    fclose($fp);
    return $aanet;
}
 
/* ------------------------------------------------------------------------ */
/*
* Muokkaa ja kirjoita tulokset talteen
*/
 
function lisaa_ja_kirjoita_tulokset($filename, &$aanet, $aani) {    
    $aanet[$aani]++;
 
    /* Katkaistaan tiedosto nollan mittaiseksi */
    $fp = avaa("$filename", "w");
    fwrite($fp, $aanet[0] . "\t" .
                $aanet[1]);
    fclose($fp);
}
 
 
/* ------------------------------------------------------------------------ */
/*
* Tulosten esittäminen
*/
function esita_tulokset($aanet)
{
   $summa = array_sum($aanet);
   $pr1 = round($aanet[0] * 100 / $summa);
   $pr2 = round($aanet[1] * 100 / $summa);
   echo "<h3>Tulokset:</h3>";
   echo "<table border bgcolor=\"#f0f0f0\">\n";
   echo "<tr><td>Pinaatti</td> <td>" . $aanet[0] . "</td><td>" . $pr1 . "%</td><td>";
   echo "<img src='prosenttia_tehty.php?percent=$pr1'>";
   echo "</td> </tr>\n";
   echo "<tr><td>Salaatti</td> <td>" . $aanet[1] . "</td><td>" . $pr2 . "%</td><td>";
   echo "<img src='prosenttia_tehty.php?percent=$pr2'>";
   echo "</td> </tr>\n";
   echo "</table>";
    
    
}
 
/* ------------------------------------------------------------------------ */
/*
* Graafin piirtäminen
*/
function tee_graafi($aanimaara, $summa)
{
    for($i=1;$i<=$aanimaara;$i++)      
      echo "*";
}
 
 
/* ------------------------------------------------------------------------ */
/*
* Tiedoston avaaminen halutussa moodissa
*/
function avaa($filename, $mode) {
   if (!$filename == "") {
      $fp = @fopen($filename, $mode )
         or die ("Tiedoston $filename avausvirhe. Toiminto keskeytynyt.\n");
      return $fp;
   } else {
      return FALSE;
   }
}
 
?> 