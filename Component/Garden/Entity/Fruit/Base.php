<?php

namespace Component\Garden\Entity\Fruit;

abstract class Base {

    protected int $_minWeight;
    protected int $_maxWeight;

    protected string $_treeId;
    protected int $_weight;

    public function __construct(string $treeId) {
        $this->_treeId = $treeId;
        $this->_setWeight();
    }

    public function weight(): int {
        return $this->_weight;
    }

    public function treeId(): string {
        return $this->_treeId;
    }

    private function _setWeight(): void {
        $this->_weight = rand($this->_minWeight, $this->_maxWeight);
    }
}