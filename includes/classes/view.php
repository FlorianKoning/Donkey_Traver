<?php
namespace mvcForm {
    class view {
        private $model;
        private $controller;

        public function __construct($model, $controller) {
            $this->model = $model;
            $this->controller = $controller;
        }

        public function userEventForm(string $voornaam, string $achternaam) {
            $this->controller->updateModel($voornaam, $achternaam);
        }

        public function viewContent() {
            print '<br> De inhoud van de variabelen in model zijn: <br>' . $this->model->getVoornaam() . ' ' . $this->model->getAchternaam();
        }
    }
}