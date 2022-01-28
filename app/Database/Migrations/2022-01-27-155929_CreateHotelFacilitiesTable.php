<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHotelFacilitiesTable extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel hotel_facilities
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
            'image' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'description' => [
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

        // Membuat tabel hotel_facilities
        $this->forge->createTable('hotel_facilities', TRUE);
    }

    public function down()
    {
        // menghapus tabel hotel_facilities
        $this->forge->dropTable('hotel_facilities');
    }
}
