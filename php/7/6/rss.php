#!/usr/bin/php -q

<?php
// crontab -e
// 0  *  *  *  *  /home/ara/public_html/iim50300/09-2015-vko-12/cmd-aikaleimat.php

$hakemisto = "/home/K8760/public_html/ttms0900-harkat/7/6";
require_once('/home/K8760/php/db.php');
     
$stmt = haeRSS($db);
sqlResult2Html($stmt);
 
function haeRSS($db) {
   $sql = <<<SQLEND
   SELECT tunnus, url, tilatieto
   FROM rss
SQLEND;
 
   $stmt = $db->prepare($sql);
   $stmt->execute();
   return $stmt;    
}
 
// SQL-kyselyn tulosjoukko HTML-taulukkoon.
function sqlResult2Html($stmt) {
 
$row_count = $stmt->rowCount();
$col_count  = $stmt->columnCount();
$fp = fopen("$hakemisto/rss.html", "a");
define("MAX_FEED_COUNT", 3);
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($row['tilatieto'] == true) {
        $sxml = simplexml_load_file($row['url']);

       if (isset($sxml->channel->image->url)) {
          $feedlogo = $sxml->channel->image->url;
          fwrite($fp,"<img src='$feedlogo'><br>\n");
       } else {
          $otsikko = $sxml->channel->title;
          fwrite($fp,"<h3>$otsikko</h3>\n");
       }
       fwrite($fp, "<dl>");
       $i = 1;
       foreach($sxml->channel->item as $item) {
          if ($i > MAX_FEED_COUNT) break;
          fwrite($fp, "<dt><a href='$item->link'>$item->title</a></dt>\n");
          fwrite($fp,"<dl><code>$item->pubDate</code></dl>\n");
          fwrite($fp,"<dl>$item->description</dl>\n");
          $i++;
       }
       fwrite($fp,"</dl>");
    }
    }
}
fclose($fp);
?>
