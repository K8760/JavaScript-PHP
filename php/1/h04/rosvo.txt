<title>Rosvo.php</title>

<?php
$i = 0;
$arr = array(0,0,0); 
while($i<3)
{
    $arr[$i] = rand(1,10);
    if ($i == 0) echo "<img src='$arr[$i].jpg'>";
    else if ($i == 1)
    {
        while(true)
        {
            if ($arr[$i] == $arr[$i-1]) $arr[$i] = rand(1,10); else break;
        }
        echo "<img src='$arr[$i].jpg'>";
    }
    else
    {
       while(true)
        {
            if ($arr[$i] == $arr[$i-1]) $arr[$i] = rand(1,10); 
            else if ($arr[$i] == $arr[$i-2]) $arr[$i] = rand(1,10);
            else break;
                
        } 
        echo "<img src='$arr[$i].jpg'>";
    }
    $i++;
}
?>

