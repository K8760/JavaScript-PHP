<?php
    session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Vartiointiliike Jyväskyylä Ky - Hinnasto</title>
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

<!-- MENUT -->

<div id="content">

  <div class="artikkeli">
<!--<img src="pic1.jpg" hspace="6" alt="pic1" align="right" />-->
      <h2>Hinnasto</h2>
<pre>
Tuntityöt
                                  Tehovartiointi   Normaali vartiointi
Perushinta 	                  415  eur/h       322 eur/h
Iltaisin (17-22) ja lauantaisin   565  eur/h       322 eur/h
Öisin (22-08) ja sunnuntaisin     816  eur/h       542 eur/h
Matka-aika                        417  eur/h       335 eur/h
Matkakorvaus                      2,95 eur/km      2,95 eur/km
Matkakorvaus Jyvässeudulla        90   eur/käynti  90 eur/käynti
</pre>

<p>
Hintoihin lisätään arvonlisävero 23% ja ne ilmoitetaan sitoumuksetta. Minimiveloitus on asiakkaan tiloissa 1 tunti. Hälytysluonteisissa töissä veloitetaan kahdelta ensimmäiseltä tunnilta hälytyslisä 500 eur/h. 
</p>


<p>
Kysy laadukkaita pakettejamme.
</p>

  
	<p><a href="jyvaskyyla2.php">Lue lisää...</a></p>

<br clear="right">
   </div> <!-- artikkeli-->
</div>
  
 
</div> <!-- div#contentwrapper-->


</div>  


  <div id="footer">
      &copy;Jyvaskyylä Ky - Kyösti Kyy, kyyla@jyvaskyyla.kyy.fi
  </div>
  

</body>
</html>
