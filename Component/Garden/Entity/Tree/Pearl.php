<?php

namespace Component\Garden\Entity\Tree;

class Pearl extends Base {

    public function getMinFruitsAmount(): int {
        return 0;
    }

    public function getMaxFruitsAmount(): int {
        return 20;
    }

}