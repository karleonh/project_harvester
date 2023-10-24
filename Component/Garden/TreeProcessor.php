<?php

namespace Component\Garden;

use Component\Garden\Entity;

class TreeProcessor {

    public function createAppleTrees(int $amount): array {
        $counter = 0;
        $appleTrees = [];
        for($i = 0; $i < $amount; $i++) {
            $id = 'apple_'.++$counter;
            $appleTrees[] = $this->createAppleTreeWithFruits($id);
        }
        return $appleTrees;
    }

    public function createPearlTrees(int $amount): array {
        $counter = 0;
        $pearlTrees = [];
        for($i = 0; $i < $amount; $i++) {
            $id = 'pearl'.++$counter;
            $pearlTrees[] = $this->createPearlTreeWithFruits($id);
        }
        return $pearlTrees;
    }

    public function createAppleTreeWithFruits(string $treeId): Entity\Tree\Apple {
        $tree = new Entity\Tree\Apple($treeId);
        return $this->_fillTree($tree);
    }

    public function createPearlTreeWithFruits(string $treeId): Entity\Tree\Pearl {
        $tree = new Entity\Tree\Pearl($treeId);
        return $this->_fillTree($tree);
    }

    private function _fillTree(Entity\Tree\Base $tree): Entity\Tree\Base {
        $minFruitsAmount = $tree->getMinFruitsAmount();
        $maxFruitsAmount = $tree->getMaxFruitsAmount();
        $fruitsAmount    = rand($minFruitsAmount, $maxFruitsAmount); // Вероятно это можно убрать в энтити, но я не придумал не запутывающего нейма

        $fruits = [];
        for ($i = 0; $i < $fruitsAmount; $i++) {
            $fruit = $this->_createFruitByTree($tree);
            $fruits[] = $fruit;
        }

        $tree->setFruits($fruits);
        return $tree;
    }

    private function _createFruitByTree(Entity\Tree\Base $tree): Entity\Fruit\Base {
        if ($tree instanceof Entity\Tree\Apple) {
            return new Entity\Fruit\Apple($tree->id());
        }
        return new Entity\Fruit\Pearl($tree->id());
    }

}