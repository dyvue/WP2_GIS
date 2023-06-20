<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionMenus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'CHAR', 'constraint' => 10],
            'transaction_id'    => ['type' => 'VARCHAR', 'constraint' => 16],
            'menu_id'           => ['type' => 'CHAR', 'constraint' => 10],
            'total'             => ['type' => 'INT', 'constraint' => 2],
            'created_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'        => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transaction_menus', true);
    }

    public function down()
    {
        $this->forge->dropTable('transaction_menus');
    }
}
