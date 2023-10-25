<?php

namespace Tests;

use Component\Garden;
use PHPUnit\Framework\TestCase;

require_once '..\vendor\autoload.php';
require_once '..\config.php';

class Tree extends TestCase {

    private ?Garden\TreeProcessor     $_treeProcessor;
    private ?Garden\Entity\Tree\Apple $_mockedAppleTree;
    private ?Garden\Entity\Tree\Pearl $_mockedPearlTree;

    protected function setUp(): void {
        $this->_treeProcessor = new Garden\TreeProcessor();

        $this->_mockedAppleTree = $this->_treeProcessor->createAppleTreeWithFruits('apple_1');
        $this->_mockedPearlTree = $this->_treeProcessor->createPearlTreeWithFruits('pearl_1');
    }

    protected function tearDown(): void {
        $this->_gardenProcessor = null;

        $this->_mockedAppleTree = null;
        $this->_mockedPearlTree = null;
    }

    public function testTreeId(): void {
        $this->assertNotNull($this->_mockedAppleTree->id());
        $this->assertNotNull($this->_mockedPearlTree->id());
    }

    public function testRemoveFruits(): void {
        $appleTree = $this->_mockedAppleTree;
        $pearlTree = $this->_mockedPearlTree;

        $appleTree->removeFruits();
        $pearlTree->removeFruits();

        $this->assertEquals(0, count($appleTree->fruits()));
        $this->assertEquals(0, count($pearlTree->fruits()));
    }

    public function testFruitsAmount(): void {
        $appleTree = $this->_mockedAppleTree;
        $pearlTree = $this->_mockedPearlTree;

        $appleTreeFruitsCount = count($appleTree->fruits());
        $pearlTreeFruitsCount = count($pearlTree->fruits());

        $this->assertTrue($appleTreeFruitsCount <= $appleTree->getMaxFruitsAmount());
        $this->assertTrue($appleTreeFruitsCount >= $appleTree->getMinFruitsAmount());

        $this->assertTrue($pearlTreeFruitsCount <= $pearlTree->getMaxFruitsAmount());
        $this->assertTrue($pearlTreeFruitsCount >= $pearlTree->getMinFruitsAmount());
    }
}