<?php

return [

    'up' => function () use ($app) {

        $db = $app['db'];

        /** @var Pagekit\Component\Database\Utility $util */
        $util = $app['db']->getUtility();

        if ($util->tableExists('@system_menu_item') !== false) {
            $tableDiff = new Doctrine\DBAL\Schema\TableDiff('@system_menu_item', [
                new \Doctrine\DBAL\Schema\Column('cssclass', \Doctrine\DBAL\Types\StringType::getType('string'))
            ]);
            $util->alterTable($tableDiff);
        }

    }

];
