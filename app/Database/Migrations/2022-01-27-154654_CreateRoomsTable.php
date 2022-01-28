<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel rooms
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 13,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'type' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
            ],
            'image' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
            ],
            'quantity' => [
                'type'           => 'INT',
                'constraint'     => 13,
                'default'        => 0,
            ],
            'created_at'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
                'on update'      => 'NOW()'
            ],
            'updated_at'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
                'on update'      => 'NOW()'
            ],

        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('rooms', TRUE);
    }

    public function down()
    {
        // menghapus tabel rooms
        $this->forge->dropTable('rooms');
    }
}
