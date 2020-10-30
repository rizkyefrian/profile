<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prodi extends Migration
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
			'id_jurusan'          => [
				'type'           => 'INT',
				'constraint'     => 11,
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
		$this->forge->createTable('prodis');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('prodis');
	}
}
