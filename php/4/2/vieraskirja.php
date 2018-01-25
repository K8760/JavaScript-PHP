<?php
  echo "<meta charset='UTF-8'>";
  require_once 'vieraskirja.class.php';
  echo '<h1>Vieraskirja</h1>' . "\n";
  $viesti1 = new Viesti('Otsikko 1','Ekaa viestiä pukkaa, pukkaa', 'Ari Rantala', '31.1.2008');
  $viesti2 = new Viesti('Otsikko 2','Tokaa viestiä pukkaa, pukkaa', 'Ari Juhani Rantala', '31.1.2008');
  $viesti3 = new Viesti('Otsikko 3','Kokaa viestiä pukkaa, pukkaa', 'Yuri Ahani Rantala', '1.2.2008');

  $vieraskirja = new Vieraskirja();
  
  $vieraskirja->lisaa($viesti1);
  $vieraskirja->lisaa($viesti2);
  $vieraskirja->lisaa($viesti3);


  $vieraskirja->tulosta(); // Tulostaa kaikki lisätyt viestit
  echo '<p>Viestejä yhteensä '. $vieraskirja->viestilukumaara() . ' kappaletta</p>' . "\n";

  $viesti4 = new Viesti('Otsikko 4','Nekaa viestiä pukkaa, pukkaa', 'Arska Rantala', '1.2.2008');
  $vieraskirja->lisaa($viesti4); 

  $vieraskirja->poista($viesti2); 

  $vieraskirja->tulosta();
  echo '<p>Viestejä yhteensä '. $vieraskirja->viestilukumaara() . ' kappaletta</p>' . "\n";

?> 