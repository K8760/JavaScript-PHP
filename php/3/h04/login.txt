<?php
session_start();
echo "<meta charset='UTF-8'>";

$logins["free"] = "123";
$logins["froo"] = "456";
$logins["fraa"] = "789";


$errmsg = '';
if (isset($_POST['uid']) AND isset($_POST['passwd'])) {
    // Kovakoodatut tunnus ja salasana
    foreach ( $logins as $name => $koodi)
    {
        if ($_POST['uid'] === $name AND $_POST['passwd'] === $koodi) {
            // Kirjautuminen ok, merkintä sessiotauluun
            $_SESSION['app1_islogged'] = true;
            $_SESSION['uid'] = $_POST['uid']; // Tässä mukavuussyistä, voidaan tulostella yms.
             header("Location: http://" . $_SERVER['HTTP_HOST']
                                        . dirname($_SERVER['PHP_SELF']) . '/'
                                        . "pelaa.php");
            exit;
        } else {
            $errmsg = '<span style="color:red;">Tunnus/Salasana väärin!';
        }
    }
}
?>
 
<title>Kirjautusmislomake</title>
 
<?php
if ($errmsg != '') echo $errmsg;
?>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"
style=color:#000;background-color:#eeeeee>
Tunnus:<br><input type="text" name="uid" size="30"><br>
Salasana:<br><input type="text" name="passwd" size="30"><br>
<input type='submit' name='action' value='Kirjaudu'>
<br>
</form>