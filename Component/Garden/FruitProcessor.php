<?php

namespace Component\Garden;

class FruitProcessor {

    /*
     * По хорошему фрукт должен получать айди дерева при присоединении к дереву, ведь сам фрут может существовать отдельно от дерева (хотя тут вопрос к проду :) )
     * Но поскольку задача маленькая и существует в вакууме - не вижу смысла тратить время на это
     */
    public function createApple(string $treeId): Entity\Fruit\Apple {
        return new Entity\Fruit\Apple($treeId);
    }

    public function createPearl(string $treeId): Entity\Fruit\Pearl {
        return new Entity\Fruit\Pearl($treeId);
    }

}