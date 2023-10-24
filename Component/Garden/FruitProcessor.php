<?php

namespace Component\Garden;

class FruitProcessor {

    public function createApple(int $treeId): Entity\Fruit\Apple {
        return new Entity\Fruit\Apple($treeId);
    }

    public function createPearl(int $treeId): Entity\Fruit\Pearl {
        return new Entity\Fruit\Pearl($treeId);
    }

}