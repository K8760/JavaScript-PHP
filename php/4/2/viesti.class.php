<?php

class Viesti{
    function __construct($otsikko, $sisalto, $name, $dait) {
      $this->otsikko = $otsikko;
      $this->sisalto  = $sisalto;
      $this->name = $name;
      $this->dait = $dait;
    }
    
    function __destruct() {
      $this->otsikko = NULL;
      $this->sisalto  = NULL;
      $this->name = NULL;
      $this->dait = NULL;
    }
    
    function __toString() {
    return "" .
           "<h4>$this->otsikko</h4>" .
           "<p>$this->sisalto</p>" .
           "<p>kirjoittaja: $this->name</p>" .
           "<p>date: $this->dait</p>";
    }
}

?>