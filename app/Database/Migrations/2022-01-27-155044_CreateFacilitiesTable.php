<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFacilitiesTable extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel facilities
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 13,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'room_id' => [
                'type'           => 'INT',
                'constraint'     => 13,
                'unsigned'       => true,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
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

        $this->forge->addForeignKey('room_id', 'rooms', 'id');

        // Membuat tabel facilities
        $this->forge->createTable('facilities', TRUE);
    }

    public function down()
    {
        // menghapus tabel facilities
        $this->forge->dropTable('facilities');
    }
}
