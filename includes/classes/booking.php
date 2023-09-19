<?php
// Florian Koning

class Booking {
    private $bookingID;
    private $klantID;
    private $klantNaam;
    private $klantTelefoon;
    private $bookingPersoon;
    private $bookingRouteLengte;
    private $bookingKosten;


    public function __construct(int $bookingID, string $bookingPersoon, int $bookingRouteLengte, int $bookingKosten) {
        $this->bookingID = $bookingID;
        $this->bookingPersoon = $bookingPersoon;
        $this->bookingRouteLengte = $bookingRouteLengte;
        $this->bookingKosten = $bookingKosten;
    }
} 