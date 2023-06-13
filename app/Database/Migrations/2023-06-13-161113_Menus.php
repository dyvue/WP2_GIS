<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'CHAR', 'constraint' => 10],
            'menu_category_id'  => ['type' => 'CHAR', 'constraint' => 10],
            'name'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'photo'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'price'             => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'is_available'      => ['type' => 'BOOLEAN', 'default' => false],
            'is_best_seller'    => ['type' => 'BOOLEAN', 'default' => false],
            'created_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menus', true);
    }

    public function down()
    {
        $this->forge->dropTable('menus');
    }
}
