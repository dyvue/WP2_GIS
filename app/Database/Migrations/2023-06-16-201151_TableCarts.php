<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableCarts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'BINARY', 'constraint' => 16],
            'table_id'      => ['type' => 'CHAR', 'constraint' => 8],
            'menu_id'       => ['type' => 'CHAR', 'constraint' => 10],
            'total'         => ['type' => 'INT', 'constraint' => 2],
            'created_at'    => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'    => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'    => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tables', true);
    }

    public function down()
    {
        $this->forge->dropTable('tables');
    }
}
