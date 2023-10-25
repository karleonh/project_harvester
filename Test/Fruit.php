<?php

namespace Tests;

use Component\Garden;
use PHPUnit\Framework\TestCase;

require_once '..\vendor\autoload.php';
require_once '..\config.php';

class Fruit extends TestCase {

    private ?Garden\FruitProcessor $_fruitProcessor;
    private ?Garden\Entity\Fruit\Apple $_mockedApple;
    private ?Garden\Entity\Fruit\Pearl $_mockedPearl;

    protected function setUp(): void {
        $this->_fruitProcessor = new Garden\FruitProcessor();

        $this->_mockedApple = $this->_fruitProcessor->createApple('apple_1');
        $this->_mockedPearl = $this->_fruitProcessor->createPearl('pearl_1');
    }

    protected function tearDown(): void {
        $this->_fruitProcessor = null;

        $this->_mockedApple = null;
        $this->_mockedPearl = null;
    }

    public function testAppleWeight(): void {
        $weight = $this->_mockedApple->weight();
        $minWeight = $this->_mockedApple->minWeight();
        $maxWeight = $this->_mockedApple->maxWeight();

        $this->assertGreaterThanOrEqual($minWeight, $weight);
        $this->assertLessThanOrEqual($maxWeight, $weight);
    }
    public function testPearlWeight(): void {
        $weight = $this->_mockedPearl->weight();
        $minWeight = $this->_mockedPearl->minWeight();
        $maxWeight = $this->_mockedPearl->maxWeight();

        $this->assertGreaterThanOrEqual($minWeight, $weight);
        $this->assertLessThanOrEqual($maxWeight, $weight);
    }

    public function testFruitsHasTreeIdOnCreation(): void {
        $this->assertNotNull($this->_mockedApple->treeId());
        $this->assertNotNull($this->_mockedPearl->treeId());
    }

    public function testCommon(): void {
        $this->assertTrue($this->_mockedApple instanceof Garden\Entity\Fruit\Apple);
        $this->assertTrue($this->_mockedPearl instanceof Garden\Entity\Fruit\Pearl);
    }

}