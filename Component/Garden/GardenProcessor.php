<?php

namespace Component\Garden;

use Component\Garden\Entity\Garden;

class GardenProcessor {

    private TreeProcessor $_treeProcessor;

    public function __construct() {
        $this->_treeProcessor = new TreeProcessor();
    }

    public function createDefaultGarden(): Garden {
        $appleTreesAmount = $GLOBALS['config']['trees_amount']['apple'];
        $pearlTreesAmount = $GLOBALS['config']['trees_amount']['pearl'];

        $appleTrees = $this->_treeProcessor->createAppleTrees($appleTreesAmount);
        $pearlTrees = $this->_treeProcessor->createPearlTrees($pearlTreesAmount);

        return new Garden($appleTrees, $pearlTrees);
    }

}