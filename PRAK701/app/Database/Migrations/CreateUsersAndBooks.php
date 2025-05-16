<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersAndBooks extends Migration
{
    public function up()
    {
        // tabel user
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'username' => ['type' => 'VARCHAR', 'constraint' => 50],
            'email'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user');

        // tabel buku
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'judul'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'penulis'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'penerbit'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'tahun_terbit'=> ['type' => 'INT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('buku');

        // Relasi 1-1 (opsional) biasanya relasi satu user punya buku, tapi di sini hanya buat contoh id sama
        // Jika ingin relasi, biasanya ada field user_id di buku, tapi sesuai permintaan kita tidak buat itu
    }

    public function down()
    {
        $this->forge->dropTable('buku');
        $this->forge->dropTable('user');
    }
}
