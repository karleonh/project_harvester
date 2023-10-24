<?php

namespace Component\Garden;

class Facade {

    private GardenProcessor $_gardenProcessor;

    public function __construct() {
        $this->_gardenProcessor = new GardenProcessor();
    }

    public function createDefaultGarden(): Entity\Garden {
        return $this->_gardenProcessor->createDefaultGarden();
    }


}