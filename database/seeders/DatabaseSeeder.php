<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Domain;
use App\Models\Server;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        Unit::truncate();
        Server::truncate();
        Domain::truncate();

        $admin = User::factory()->create([
            'name' => 'Mas Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'is_admin' => true
        ]);

        // --
        $unit1 = Unit::create([
            'name' => 'FMIPA',
            'description' => 'Unit FMIPA'
        ]);

        $unit2 = Unit::create([
            'name' => 'FK',
            'description' => 'Unit FK'
        ]);

        $user1 = User::factory()->create([
            'username' => 'user1',
            'password' => bcrypt('user'),
            'unit_id' => $unit1->id
        ]);

        $user2 = User::factory()->create([
            'username' => 'user2',
            'password' => bcrypt('user'),
            'unit_id' => $unit1->id
        ]);

        $user3 = User::factory()->create([
            'username' => 'user3',
            'password' => bcrypt('user'),
            'unit_id' => $unit2->id
        ]);

        $user4 = User::factory()->create([
            'username' => 'user4',
            'password' => bcrypt('user'),
            'unit_id' => $unit2->id
        ]);

        $server1 = Server::create([
            'name' => 'webserverfmipa',
            'server_type' => 'Fisik',
            'status' => 'Aktif',
            'ip_address' => '192.168.1.1',
            'processor' => 'Intel Core i7-7700K',
            'core_processor_count' => '4',
            'ram' => '16 GB',
            'unit_id' => $unit1->id
        ]);

        $server2 = Server::create([
            'name' => 'mailserverfmipa',
            'server_type' => 'Virtual',
            'status' => 'Tidak Aktif',
            'ip_address' => '192.168.1.2',
            'processor' => 'Intel Core i5-7700K',
            'core_processor_count' => '2',
            'ram' => '8 GB',
            'unit_id' => $unit1->id
        ]);

        $server3 = Server::create([
            'name' => 'webserverfk',
            'server_type' => 'Fisik',
            'status' => 'Aktif',
            'ip_address' => '192.168.2.1',
            'processor' => 'AMD Ryzen 5 3700X',
            'core_processor_count' => '4',
            'ram' => '16 GB',
            'unit_id' => $unit2->id
        ]);

        $server4 = Server::create([
            'name' => 'mailserverfk',
            'server_type' => 'Virtual',
            'status' => 'Tidak Aktif',
            'ip_address' => '192.168.2.2',
            'processor' => 'AMD Ryzen 7 3700X',
            'core_processor_count' => '2',
            'ram' => '8 GB',
            'unit_id' => $unit2->id
        ]);

//        $domain1 = Domain::create([
//            'url' => 'https://sales.example.com',
//            'nama' => 'Website Penjualan',
//            'deskripsi' => 'Website penjualan produk',
//            'jenis_aplikasi' => 'Website',
//
//            'ip_address' => '192.168.1.1',
//            'port' => '80',
//            'processor' => 'Intel Core i7-7700K',
//            'jumlah_core_processor' => '4',
//            'ram' => '16 GB',
//
//            'jenis_server' => 'Virtual',
//            'nama_server' => 'VPS01',
//            'status' => 'Aktif',
//            'http_status' => '200',
//            'user_id' => $user1->id,
//            'unit_id' => $unit1->id,
//        ]);
//
//        $domain2 = Domain::create([
//            'url' => 'https://sales-api.example.com',
//            'nama' => 'API Penjualan',
//            'deskripsi' => 'API penjualan produk',
//            'jenis_aplikasi' => 'Web API',
//            'ip_address' => '192.168.1.2',
//            'port' => '8080',
//            'processor' => 'AMD Ryzen 7 3700X',
//            'jumlah_core_processor' => '8',
//            'ram' => '16 GB',
//            'jenis_server' => 'Virtual',
//            'nama_server' => 'VPS02',
//            'status' => 'Aktif',
//            'http_status' => '200',
//            'user_id' => $user1->id,
//            'unit_id' => $unit1->id,
//        ]);
//
//        $domain3 = Domain::create([
//            'url' => 'https://marketing.example.com',
//            'nama' => 'Website Marketing',
//            'deskripsi' => 'Website pemasaran produk',
//            'jenis_aplikasi' => 'Website',
//            'ip_address' => '192.168.2.1',
//            'port' => '80',
//            'processor' => 'Intel Core i7-7700K',
//            'jumlah_core_processor' => '4',
//            'ram' => '16 GB',
//            'jenis_server' => 'Virtual',
//            'nama_server' => 'VPS03',
//            'status' => 'Aktif',
//            'http_status' => '200',
//            'user_id' => $user2->id,
//            'unit_id' => $unit2->id,
//        ]);
//
//        $domain4 = Domain::create([
//            'url' => 'https://marketing-api.example.com',
//            'nama' => 'API Pemasaran',
//            'deskripsi' => 'API pemasaran produk',
//            'jenis_aplikasi' => 'REST',
//            'ip_address' => '192.168.2.2',
//            'port' => '8080',
//            'processor' => 'AMD Ryzen 7 3700X',
//            'jumlah_core_processor' => '8',
//            'ram' => '16 GB',
//            'jenis_server' => 'Virtual',
//            'nama_server' => 'VPS04',
//            'status' => 'Aktif',
//            'http_status' => '200',
//            'user_id' => $user2->id,
//            'unit_id' => $unit2->id,
//        ]);
//
//        $domain5 = Domain::create([
//            'url' => 'https://finance.example.com',
//            'nama' => 'Website Finance',
//            'deskripsi' => 'Website keuangan',
//            'jenis_aplikasi' => 'Website',
//            'ip_address' => '192.168.3.1',
//            'port' => '80',
//            'processor' => 'AMD Ryzen 5',
//            'jumlah_core_processor' => '4',
//            'ram' => '6 GB',
//            'jenis_server' => 'Virtual',
//            'nama_server' => 'VPS03',
//            'status' => 'Aktif',
//            'http_status' => '200',
//            'user_id' => $user3->id,
//            'unit_id' => $unit3->id,
//        ]);
//
//        $domain6 = Domain::create([
//            'url' => 'https://finance-api.example.com',
//            'nama' => 'API Keuangan',
//            'deskripsi' => 'API keuangan',
//            'jenis_aplikasi' => 'Web API',
//            'ip_address' => '192.168.3.2',
//            'port' => '8080',
//            'processor' => 'AMD Ryzen 7 3700X',
//            'jumlah_core_processor' => '8',
//            'ram' => '16 GB',
//            'jenis_server' => 'Virtual',
//            'nama_server' => 'VPS04',
//            'status' => 'Aktif',
//            'http_status' => '200',
//            'user_id' => $user3->id,
//            'unit_id' => $unit3->id,
//        ]);


        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
