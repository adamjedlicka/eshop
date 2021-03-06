<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateForgottenPasswordTable extends AbstractMigration
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
        $this->table('forgotten_password')
            ->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'user', 'id')
            ->addColumn('code', 'string')
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
