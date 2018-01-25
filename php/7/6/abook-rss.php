<?php


echo "<meta charset='UTF-8'>";
include ("navbar.php");

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

define("MAX_FEED_COUNT", 3);
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //echo $row['url']. "<br>";
    if ($row['tilatieto'] == true) {
        $sxml = simplexml_load_file($row['url']);

       if (isset($sxml->channel->image->url)) {
          $feedlogo = $sxml->channel->image->url;
          echo "<img src='$feedlogo'><br>\n";
       } else {
          $otsikko = $sxml->channel->title;
          echo "<h3>$otsikko</h3>\n";
       }
       echo "<dl>";
       $i = 1;
       foreach($sxml->channel->item as $item) {
          if ($i > MAX_FEED_COUNT) break;
          echo "<dt><a href='$item->link'>$item->title</a></dt>\n";
          echo "<dl><code>$item->pubDate</code></dl>\n";
          echo "<dl>$item->description</dl>\n";
          $i++;
       }
       echo "</dl>";
    }
    }
}
    