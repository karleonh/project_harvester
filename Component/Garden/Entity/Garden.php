<?php

namespace Component\Garden\Entity;

use Component\Garden\Entity;

class Garden {

    /** @var Entity\Tree\Apple[] $_appleTrees */
    private array $_appleTrees;

    /** @var Entity\Tree\Pearl[] $_pearlTrees */
    private array $_pearlTrees;

    /**
     * @param Entity\Tree\Apple[] $appleTrees
     * @param Entity\Tree\Pearl[] $pearlTrees
     */
    public function __construct(
        array $appleTrees,
        array $pearlTrees
    ) {
        $this->_appleTrees = $appleTrees;
        $this->_pearlTrees = $pearlTrees;
    }

    public function appleTrees(): array {
        return $this->_appleTrees;
    }

    public function pearlTrees(): array {
        return $this->_pearlTrees;
    }
}