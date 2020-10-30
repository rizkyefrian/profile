<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'name'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '30',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'level'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '5',
				'null'           => true,
			],
			'created_at'       => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
			'updated_at'       => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
