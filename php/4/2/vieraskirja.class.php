<?php
require_once 'viesti.class.php';

class Vieraskirja {
    private $viestit = array(); // Lisätyt viestit tallennetaan tähän taulukkoon
    
    function __construct() {
    }
    function __destruct() {
      $this->viestit = NULL;
    }

    public function lisaa($viesti) {
           array_push($this->viestit,$viesti);
    }

    public function poista($viesti) {
        foreach($this->viestit as $i => $v) {
            if ($viesti == $v) array_splice($this->viestit,$i,1);
        }
    } 

    public function tulosta() {
      foreach ($this->viestit as $v) {
          echo $v;
      }
    } 

    function viestilukumaara() {
            $i = count($this->viestit);
            return $i;
    } 
}

?>