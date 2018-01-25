<?php
session_start();

$vw_lkm = isset($_SESSION['vw_lkm']) ? $_SESSION['vw_lkm'] : 0;
$opel_lkm =isset($_SESSION['opel_lkm']) ? $_SESSION['opel_lkm'] : 0;
$painike = isset($_POST['painike']) ? $_POST['painike'] : '';

laske_lkm($vw_lkm, $opel_lkm, $painike);
aseta($vw_lkm, $opel_lkm);
tee_lomake();
nayta_tulokset($vw_lkm, $opel_lkm);

function laske_lkm(&$vw_lkm, &$opel_lkm, $nappi)
{
    if (isset($nappi)) {
       if ($nappi == "VW") {
           $vw_lkm++;
       }
       if ($nappi == "OPEL") {
          $opel_lkm++;
       }
        if ($nappi == "Nollaa") {
          $vw_lkm = 0;
          $opel_lkm = 0;
          session_destroy();
        }
    }
}

function nayta_tulokset($vw_lkm, $opel_lkm)
{
    echo "<pre>\n";
    echo "Volkswagenit ...: $vw_lkm kpl. \n";
    echo "Opelit...... ...: $opel_lkm kpl. \n";
    echo "<pre>\n";
}

function aseta($vw_lkm, $opel_lkm)
{
    $_SESSION['vw_lkm'] = $vw_lkm;
    $_SESSION['opel_lkm'] = $opel_lkm ;
}

function tee_lomake()
{
?>
    <form method="post" action="<?php echo $_SERVER{'PHP_SELF'}?>">
       <input type="submit" value="VW" name="painike">
       <input type="submit" value="OPEL" name="painike">
       <input type="submit" value="Nollaa" name="painike">
   </form>
<?php
}


?>