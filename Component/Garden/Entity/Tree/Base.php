<?php

namespace Component\Garden\Entity\Tree;

abstract class Base {

    protected array $_fruits;
    protected string $_id;

    public function __construct(string $id) {
        $this->_id = $id;
    }

    public function fruits(): array {
        return $this->_fruits;
    }

    public function removeFruits(): void {
        $this->_fruits = [];
    }

    public function id(): string {
        return $this->_id;
    }

    /** @var \Component\Garden\Entity\Fruit\Base[] $fruits */
    public function setFruits(array $fruits): void {
        $this->_fruits = $fruits;
    }

    abstract public function getMinFruitsAmount(): int;
    abstract public function getMaxFruitsAmount(): int;
}