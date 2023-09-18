<?php
namespace mvcForm {
    class Controller {
        private $model;

        public function __construct($model) {
            $this->model = $model;
        }

        public function updateModel(string $voornaam, string $achternaam) {
            $this->model->setVoornaam($voornaam);
            $this->model->setAchternaam($achternaam);
        }
    }


}