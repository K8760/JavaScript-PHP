<form action="esim.php" method="get">
Syöte: <input type=text name="indata">
<input type=submit>
</form>

<pre>
<?php
$indata = "yksi + kaksi";
echo ("1:" . $indata . "\n");
echo ("2:" . urlencode($indata) . "\n");
echo ("3:" . rawurlencode($indata) . "\n");
$indata_urlcoded = urlencode($indata);
$indata_rawurlcoded = rawurlencode($indata);
echo ("4:" . urldecode($indata_urlcoded) . "\n");
echo ("5:" . rawurldecode($indata_rawurlcoded) . "\n");
?>
</pre>
<h3>Tuloksen tuotti seuraava PHP-skripti</h3>
<?php
show_source("$SCRIPT_FILENAME");
?>