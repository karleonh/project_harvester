<?php

namespace Component\Garden;

class TreeProcessor {

    private FruitProcessor $_fruitProcessor;

    public function __construct() {
        $this->_fruitProcessor = new FruitProcessor();
    }

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
        $tree = $this->_createEmptyAppleTree($treeId);
        return $this->_fillTree($tree);
    }

    public function createPearlTreeWithFruits(string $treeId): Entity\Tree\Pearl {
        $tree = $this->_createEmptyPearlTree($treeId);
        return $this->_fillTree($tree);
    }

    private function _createEmptyAppleTree(string $treeId): Entity\Tree\Apple {
        $appleTree = new Entity\Tree\Apple($treeId);
        return $appleTree;
    }

    private function _createEmptyPearlTree(string $treeId): Entity\Tree\Pearl {
        $pearlTree = new Entity\Tree\Pearl($treeId);
        return $pearlTree;
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
            return $this->_fruitProcessor->createApple($tree->id());
        }
        return $this->_fruitProcessor->createPearl($tree->id());
    }

}