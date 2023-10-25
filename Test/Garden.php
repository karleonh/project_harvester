<?php

namespace Tests;

use Component;
use PHPUnit\Framework\TestCase;

require_once '..\vendor\autoload.php';
require_once '..\config.php';

class Garden extends TestCase {

    private ?Component\Garden\GardenProcessor $_gardenProcessor;

    private ?Component\Garden\Entity\Garden $_mockedGarden;

    protected function setUp(): void {
        $GLOBALS['config']['trees_amount']['apple'] = 10;
        $GLOBALS['config']['trees_amount']['pearl'] = 15;
        // Не понимаю почему в тестовом окружении require config не срабатывает D:

        $this->_gardenProcessor = new Component\Garden\GardenProcessor();

        $this->_mockedGarden = $this->_gardenProcessor->createDefaultGarden();
    }

    protected function tearDown(): void {
        $this->_gardenProcessor = null;
        $this->_mockedGarden    = null;
    }

    public function testGardenFilling(): void {
        $garden          = $this->_mockedGarden;
        $appleTreesCount = count($garden->appleTrees());
        $pearlTreesCount = count($garden->pearlTrees());

        self::assertEquals($GLOBALS['config']['trees_amount']['apple'], $appleTreesCount);
        self::assertEquals($GLOBALS['config']['trees_amount']['pearl'], $pearlTreesCount);
    }

}