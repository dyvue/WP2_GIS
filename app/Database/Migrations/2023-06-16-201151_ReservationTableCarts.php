<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReservationTableCarts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                        => ['type' => 'CHAR', 'constraint' => 10],
            'reservation_table_id'      => ['type' => 'CHAR', 'constraint' => 8],
            'menu_id'                   => ['type' => 'CHAR', 'constraint' => 10],
            'total'                     => ['type' => 'INT', 'constraint' => 2],
            'created_at'                => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'                => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'                => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('reservation_table_carts', true);
    }

    public function down()
    {
        $this->forge->dropTable('reservation_table_carts');
    }
}
