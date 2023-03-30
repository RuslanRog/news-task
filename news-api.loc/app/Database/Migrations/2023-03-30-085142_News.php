<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
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
            'categories_id' => [
                'type'              => 'INT',
                'constraint'        => '25',
                'unsigned'          => true,
                'null'              => true,
            ],
            'title_en' => [
                'type'              => 'VARCHAR',
                'constraint'        => '25',
                'null'              => false,
            ],
            'description_en' => [
                'type'              => 'TEXT',
                'null'              => false,
            ],
            'title_ua' => [
                'type'              => 'VARCHAR',
                'constraint'        => '25',
                'null'              => false,
            ],
            'description_ua' => [
                'type'              => 'TEXT',
                'null'              => false,
            ],
            'created_at' => [
                'type'              => 'TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('categories_id', 'categories', 'id');
        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
