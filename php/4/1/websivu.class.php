<?php

class Websivu {
    protected $otsikko;
    protected $avainsana;
    protected $sisalto;
    
    function __construct($otsikko, $avainsana) {
      $this->otsikko = $otsikko;
      $this->avainsana  = $avainsana;
    }
    
    private function tulostaOtsikkoelementti() {
        echo "<h1>$this->otsikko</h1>";
    }
    
    private function tulostaAvainsanaelementti() {
        echo "<h3>$this->avainsana</h3>";
    }
    
    public function asetaBodyelementinSisalto($data) {
        $this->sisalto = $data;
    }
    
    public function naytaSivu() {
        echo "<html><head></head><body>";
        $this->tulostaOtsikkoelementti();
        $this->tulostaAvainsanaelementti();
        echo "<p>$this->sisalto</p>";
        echo "</body></html>";
    }
}

?>