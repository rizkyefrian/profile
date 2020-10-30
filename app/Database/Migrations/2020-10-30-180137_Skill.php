<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Skill extends Migration
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
					'constraint'     => '50',
			],
			'gambar'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
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
		$this->forge->createTable('skills');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('skills');
	}
}
