<?php

class Autolaskuri {
    
    private $a = array("VW", "Opel", "Toyota");
    private $lask = array(0, 0, 0);
    
    function laske($nappi) {
        if ($nappi == "Nollaa") {
            for($i=0;$i<3;$i++) $this->lask[$i]=0;
        }
        else
            for($i=0;$i<3;$i++)
            {
                if ($nappi == $this->a[$i]) $this->lask[$i]++;
            }
    }
    
    function printdata() {
        echo "<pre>\n";
        echo '<p>Volkswagenit ...:'. $this->lask[0] . ' kappaletta</p>' . "\n";
        echo '<p>Opelit .........:'. $this->lask[1] . ' kappaletta</p>' . "\n";
        echo '<p>Toyotat .........:'. $this->lask[2] . ' kappaletta</p>' . "\n";
        echo "<pre>\n";
    }
    
    function setses() {
        $this->lask[0] = isset($_SESSION['vw_lkm']) ? $_SESSION['vw_lkm'] : 0;
        $this->lask[1] = isset($_SESSION['opel_lkm']) ? $_SESSION['opel_lkm'] : 0;
        $this->lask[2] = isset($_SESSION['toy_lkm']) ? $_SESSION['toy_lkm'] : 0;
    }
    
    function setdata() {
        $_SESSION['vw_lkm'] = $this->lask[0];
        $_SESSION['opel_lkm'] = $this->lask[1];
        $_SESSION['toy_lkm'] = $this->lask[2];
    }
}

?>