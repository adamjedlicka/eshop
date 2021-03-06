<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateValueTable extends AbstractMigration
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
        $this->table('value')
            ->addColumn('name', 'string')
            ->addColumn('attribute_id', 'integer')
            ->addForeignKey('attribute_id', 'attribute', 'id')
            ->create();

            if ($this->isMigratingUp()) {
                $this->table('resource')
                    ->insert([
                        ['id' => 'Admin:Value'],
                        ['id' => 'Value'],
                    ])
                    ->saveData();

                $this->table('permission')
                    ->insert([
                        ['role_id' =>  'admin', 'resource_id' => 'Admin:Value', 'action' => '', 'type' => 'allow'],
                        ['role_id' =>  'admin', 'resource_id' => 'Value', 'action' => '', 'type' => 'allow'],
                    ])
                    ->saveData();
            }
    }
}
