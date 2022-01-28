<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel reservations
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 13,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'guess_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true
            ],
            'phone' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'room_id' => [
                'type'           => 'INT',
                'constraint'     => 13,
                'unsigned'       => true,
            ],
            'check_in' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'check_out' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'room_total' => [
                'type'           => 'INT',
                'constraint'     => 13,
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


        // Membuat tabel reservations
        $this->forge->createTable('reservations', TRUE);
    }

    public function down()
    {
        // menghapus tabel reservations
        $this->forge->dropTable('reservations');
    }
}
