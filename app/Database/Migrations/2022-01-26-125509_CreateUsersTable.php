<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel users
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 13,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'password'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
				'default'        => 'John Doe',
			],
			'fullname' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'           => true,
			],
			'status'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '10',
				'default'        => 'admin',
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
		$this->forge->createTable('users', TRUE);
	}

	public function down()
	{
		// menghapus tabel users
		$this->forge->dropTable('users');
	}
}
