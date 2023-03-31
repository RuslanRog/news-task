<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => '25',
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'category_name_en' => [
                'type'              => 'VARCHAR',
                'constraint'        => '55',
                'null'              => true,
            ],
            'category_name_ua' => [
                'type'              => 'VARCHAR',
                'constraint'        => '55',
                'null'              => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
