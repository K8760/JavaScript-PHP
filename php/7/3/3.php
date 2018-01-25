



<?php

echo "<form method='get' action='3.php'>\n";
echo "<input type='text' name='inp'>\n";
echo "<input type='submit' name='nappi' value='GET'><br>\n";
if (isset($_GET['inp'])) {
    $text = file_get_contents($_GET['inp']);
    preg_match_all("/\<a[^>]*?href[^>]*?\>(.*)\<\/a\>/", $text, $matches);
    $urls = $matches[1];
    echo "<ul>\n";
    for ($i = 0; $i < count($urls); $i++)
        echo "<li>". $urls[$i] . "</li>\n";
    echo "</ul>\n";
}
echo "</form>\n";
?>