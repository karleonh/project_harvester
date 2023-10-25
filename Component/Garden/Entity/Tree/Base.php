<?php

namespace Component\Garden\Entity\Tree;

abstract class Base {

    protected array $_fruits;
    protected string $_id;

    public function __construct(string $id) {
        $this->_id = $id;
    }

    /**
     * @return \Component\Garden\Entity\Fruit\Base[]
     */
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
        $fruitsCount = count($fruits);
        if ($fruitsCount < $this->getMaxFruitsAmount()) {
            // todo: implement
        }
        if ($fruitsCount > $this->getMaxFruitsAmount()) {
            // todo: implement
        }

        $this->_fruits = $fruits;
    }

    abstract public function getMinFruitsAmount(): int;
    abstract public function getMaxFruitsAmount(): int;
}