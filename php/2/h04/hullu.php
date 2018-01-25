<form  method="post">
<input type="submit" name="nappi" value="Paina minua"/>
    
<?php
    session_start();
    if (empty($_SESSION['cnt'])){
        $_SESSION['cnt'] = 0;
    }

    if(isset($_POST['nappi']))
    {
        if($_SESSION['cnt']< 3){
            $_SESSION['cnt']++;
            echo mess($_SESSION['cnt']);
        }
        else $_SESSION['cnt'] = 0;
    }
    
    function mess($n)
    {
        if ($n == 1) return "Yksi kerta riita";
        if ($n == 2) return "Kaksi kertaa riita";
        if ($n == 3) return "Kolme kertaa riita";
    }
?>

</form>