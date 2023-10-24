<?php

namespace Component\Garden;

class Facade {

    private FruitProcessor  $_fruitProcessor;
    private TreeProcessor   $_treeProcessor;
    private GardenProcessor $_gardenProcessor;

    public function __construct() {
        $this->_fruitProcessor  = new FruitProcessor();
        $this->_treeProcessor   = new TreeProcessor();
        $this->_gardenProcessor = new GardenProcessor();
    }

    public function createApple(int $treeId): Entity\Fruit\Apple {
        return $this->_fruitProcessor->createApple($treeId);
    }

    public function createPearl(int $treeId): Entity\Fruit\Pearl {
        return $this->_fruitProcessor->createPearl($treeId);
    }

    public function createDefaultGarden(): Entity\Garden {
        return $this->_gardenProcessor->createDefaultGarden();
    }


}