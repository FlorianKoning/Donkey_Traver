<?php

namespace mvcForm{
    class Model {
        private $voornaam;
        private $achternaam;

        // public function __construct() {
        // }
        public function getVoornaam() {
            return $this->voornaam;
        }
        public function getAchternaam() {
            return $this->achternaam;
        }
        public function setVoornaam(string $voornaam) {
            $this->voornaam = $voornaam;
        }
        public function setAchternaam(string $achternaam) {
            $this->achternaam = $achternaam;
        }
    }

}