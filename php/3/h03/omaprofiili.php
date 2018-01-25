<?php
    session_start();
    $_SESSION['nimi'] = "";
    $_SESSION['harrastus'] = "";
    $err = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Vartiointiliike Jyväskyylä Ky - Etusivu</title>
<link rel="stylesheet" href="tyyli.css" type="text/css">

</head>

<body>

<div id="container">
  <div id="header">
<table border="0" width="100%">
<tr>
<td align="left">
<h1 id="maintitle">Jyväskyylä</h1>
<!--<img style="width: 233px; height: 76px;" alt="-" src="logo.gif" />-->
</td>
<td align="center" valign="middle">
<code class="url">jyvaskyyla.fi</code>
</td>

<td align="right">
</td></tr>
</table>  
</div>


<!-- MENUT -->
<?php
    include "navbar.php";
?>

<div id="contentwrapper">


<div id="sidebar">

<ul>
    <h2>Pikavalikko</h2>
    <ul>
      <li><a href="jyvaskyla2.php">Kyyläyspalvelut 1</a></li>
      <li><a href="jyvaskyla2.php">Kyyläyspalvelut 2</a></li>
      <li><a href="jyvaskyla2.php">Kyyläyspalvelut 3</a></li>
      <li><a href="jyvaskyla2.php">Videoneuvottelu</a></li>
      <li><a href="jyvaskyla2.php">Ohjeet</a></li>
    </ul>

</ul>
 </div>
    
<div id="content">
    
<?php
    $harrastus["Urheilu"] = 1;
    $harrastus["Musiikki"] = 2;
    $harrastus["Kirkko"] = 3;
    $harrastus["Lukeminen"] = 4;
    $harrastus["Tanssit"] = 5;
    
    if (isset($_GET['nappi']))
    {
        if (empty($_GET['nimi'])) {
            $err =  "* Value is required!";
        } 
        else {
            $_SESSION['nimi'] = $_GET['nimi'];
            $_SESSION['harrastus'] = $_GET['ehto'];
        }
    }
    
    echo "<form action='omaprofiili.php' method='get'>";
    echo "Anna nimesi: <input type='text' name='nimi'><span style=color:red;>$err</span><br>";
    
    echo "Valitse harrastuksensi: <select name='ehto'>";
    foreach($harrastus as $nimi => $koodi)
    {
        echo "<option value=$koodi> $nimi </option>";
    }
    echo "</select> <br>";
    
    echo "<input type='submit' name='nappi' value='Lähetä'> </form>";

?>

</div>
</div>

</div>  


  <div id="footer">
      &copy;Jyvaskyylä Ky - Kyösti Kyy, kyyla@jyvaskyyla.kyy.fi
  </div>
  

</body>
</html>