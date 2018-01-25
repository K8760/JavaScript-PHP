<title>Taustevari.php</title>

<?php
    $array = array("ensimmainen", "toinen", "kolmas", "neljas", "viides", "kuudes", "seitsemas");
    echo "<table>";
    for($i=0; $i<sizeof($array); $i++)
    {
        $vari =  taustaVari($i);
        echo "<tr> <td style='background-color: $vari'> $array[$i] rivi </td> </tr>";

    }
    echo "</table>";

    function taustaVari($n)
    {
      if ($n%2 == 1) return '#ffff00'; else return '#ffffff';
    }
?>
