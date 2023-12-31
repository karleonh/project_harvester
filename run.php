<?php

require_once 'vendor\autoload.php';
require_once 'config.php';

class Runner {

    private Component\Garden\Facade $_gardenComponent;

    public function __construct() {
        $this->_gardenComponent = new Component\Garden\Facade();
    }

    public function run() {

        $garden = $this->_gardenComponent->createDefaultGarden();

        $appleTrees = $garden->appleTrees();
        $pearlTrees = $garden->pearlTrees();

        $appleTreesCount = count($appleTrees);
        $pearlTreesCount = count($pearlTrees);

        $appleBasket = [];
        $pearlBasket = [];

        foreach ($appleTrees as $tree) {
            $apples = $tree->fruits();
            $appleBasket = array_merge($appleBasket, $apples);
            $tree->removeFruits();
        }

        foreach ($pearlTrees as $tree) {
            $pearls = $tree->fruits();
            $pearlBasket = array_merge($pearlBasket, $pearls);
            $tree->removeFruits();
        }

        $totalWeightApples     = 0;
        $totalWeightPearls     = 0;
        $totalFruitsCount      = 0;
        $theBiggestAppleWeight = 0;
        $theBiggestAppleTreeId = null;

        /** @var Component\Garden\Entity\Fruit\Apple $apple */
        foreach ($appleBasket as $apple) {
            $weight = $apple->weight();
            $treeId = $apple->treeId();

            $totalWeightApples += $weight;
            $totalFruitsCount++;

            if ($weight > $theBiggestAppleWeight) {
                $theBiggestAppleWeight = $weight;
                $theBiggestAppleTreeId = $treeId;
            }
        }

        /** @var Component\Garden\Entity\Fruit\Pearl $pearl */
        foreach ($pearlBasket as $pearl) {
            $weight = $pearl->weight();

            $totalWeightPearls += $weight;
            $totalFruitsCount++;
        }

        print_r("
            Вот, что удалось собрать с сада:
            Всего с {$appleTreesCount} яблонь и {$pearlTreesCount} груш было собрано {$totalFruitsCount} плодов.
            Общий вес яблок: {$totalWeightApples}
            Общий вес груш: {$totalWeightPearls}
            Самое крупное яблоко весом {$theBiggestAppleWeight} было снято с дерева с id {$theBiggestAppleTreeId}
        ");

    }

}

$runner = new Runner();
$runner->run();