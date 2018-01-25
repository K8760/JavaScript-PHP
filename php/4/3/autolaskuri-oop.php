<form method="get" action="<?php echo $_SERVER{'PHP_SELF'}?>">
       <input type="submit" value="VW" name="painike">
       <input type="submit" value="Opel" name="painike">
        <input type="submit" value="Toyota" name="painike">
       <input type="submit" value="Nollaa" name="painike">
   </form>

<?php
    session_start();

    echo "<meta charset='UTF-8'>";
    require_once 'autolaskuri.class.php';


    $auto = new Autolaskuri();

    $auto->setses();

    if (isset($_GET['painike'])) {
        $nappi = $_GET['painike'];
        $auto->laske($nappi);
    }
    
    $auto->printdata();
    $auto->setdata();
    
?>
