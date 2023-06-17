<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'BINARY', 'constraint' => 16],
            'table_id'          => ['type' => 'CHAR', 'constraint' => 8],
            'payment_method_id' => ['type' => 'CHAR', 'constraint' => 8, 'null' => true],
            'tax_11'            => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'price_total'       => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'status'            => ['type' => 'ENUM', 'constraint' => ['Diproses', 'Selesai', 'Dibatalkan'], 'default' => 'Diproses'],
            'created_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'        => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transactions', true);
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
