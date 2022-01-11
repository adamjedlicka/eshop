<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ExtendOrderTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table('order')
            ->addColumn('name', 'string')
            ->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('phone', 'string')
            ->addColumn('street', 'string')
            ->addColumn('city', 'string')
            ->addColumn('zip', 'string')
            ->addColumn('country', 'string')
            ->update();
    }
}
