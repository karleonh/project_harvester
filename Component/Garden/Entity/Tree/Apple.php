<?php

namespace Component\Garden\Entity\Tree;

class Apple extends Base {

    public function getMinFruitsAmount(): int {
        return 40;
    }

    public function getMaxFruitsAmount(): int {
        return 50;
    }

}