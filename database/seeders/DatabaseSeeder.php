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
            'description' => 'Unit FMIPA',
            'higher_domain' => 'mipa.uns.ac.id'
        ]);

        $unit2 = Unit::create([
            'name' => 'FK',
            'description' => 'Unit FK',
            'higher_domain' => 'fk.uns.ac.id'
        ]);

        $unit3 = Unit::create([
            'name' => 'FKIP',
            'description' => 'Unit FKIP',
            'higher_domain' => 'fkip.uns.ac.id'
        ]);

        $unit4 = Unit::create([
            'name' => 'FATISDA',
            'description' => 'Unit FATISDA',
            'higher_domain' => 'fatisda.uns.ac.id'
        ]);

        $unit5 = Unit::create([
            'name' => 'FH',
            'description' => 'Unit FH',
            'higher_domain' => 'hukum.uns.ac.id'
        ]);

        $unit6 = Unit::create([
            'name' => 'FIB',
            'description' => 'Unit FIB',
            'higher_domain' => 'fib.uns.ac.id'
        ]);

        $unit7 = Unit::create([
            'name' => 'FT',
            'description' => 'Unit FT',
            'higher_domain' => 'ft.uns.ac.id'
        ]);

        $unit8 = Unit::create([
            'name' => 'FISIP',
            'description' => 'Unit FISIP',
            'higher_domain' => 'fisip.uns.ac.id'
        ]);

        $user1 = User::factory()->create([
            'username' => 'user1',
            'password' => bcrypt('user'),
            'unit_id' => $unit1->id
        ]);

        $user2 = User::factory()->create([
            'username' => 'user2',
            'password' => bcrypt('user'),
            'unit_id' => $unit2->id
        ]);

        $user3 = User::factory()->create([
            'username' => 'user3',
            'password' => bcrypt('user'),
            'unit_id' => $unit3->id
        ]);

        $user4 = User::factory()->create([
            'username' => 'user4',
            'password' => bcrypt('user'),
            'unit_id' => $unit4->id
        ]);

        $user5 = User::factory()->create([
            'username' => 'user5',
            'password' => bcrypt('user'),
            'unit_id' => $unit5->id
        ]);

        $user6 = User::factory()->create([
            'username' => 'user6',
            'password' => bcrypt('user'),
            'unit_id' => $unit6->id
        ]);

        $user7 = User::factory()->create([
            'username' => 'user7',
            'password' => bcrypt('user'),
            'unit_id' => $unit7->id
        ]);

        $user8 = User::factory()->create([
            'username' => 'user8',
            'password' => bcrypt('user'),
            'unit_id' => $unit8->id
        ]);

        $server1 = Server::create([
            'name' => 'webserverfmipa',
            'server_type' => 'Physical',
            'status' => 'Active',
            'ip_address' => '192.168.1.1',
            'processor' => 'Intel Core i7-7700K',
            'core_processor_count' => '4',
            'ram' => '16',
            'unit_id' => $unit1->id
        ]);

        $server2 = Server::create([
            'name' => 'mailserverfmipa',
            'server_type' => 'Virtual',
            'status' => 'No Active',
            'ip_address' => '192.168.1.2',
            'processor' => 'Intel Core i5-7700K',
            'core_processor_count' => '2',
            'ram' => '8',
            'unit_id' => $unit1->id
        ]);

        $server3 = Server::create([
            'name' => 'webserverfk',
            'server_type' => 'Physical',
            'status' => 'Active',
            'ip_address' => '192.168.2.1',
            'processor' => 'AMD Ryzen 5 3700X',
            'core_processor_count' => '4',
            'ram' => '16',
            'unit_id' => $unit2->id
        ]);

        $server4 = Server::create([
            'name' => 'mailserverfk',
            'server_type' => 'Virtual',
            'status' => 'No Active',
            'ip_address' => '192.168.2.2',
            'processor' => 'AMD Ryzen 7 3700X',
            'core_processor_count' => '2',
            'ram' => '8',
            'unit_id' => $unit2->id
        ]);

        $server5 = Server::create([
            'name' => 'webserverfkip',
            'server_type' => 'Physical',
            'status' => 'Active',
            'ip_address' => '192.168.2.1',
            'processor' => 'AMD Ryzen 5 3700X',
            'core_processor_count' => '4',
            'ram' => '16',
            'unit_id' => $unit3->id
        ]);

        $server6 = Server::create([
            'name' => 'mailserverfkip',
            'server_type' => 'Virtual',
            'status' => 'No Active',
            'ip_address' => '192.168.2.2',
            'processor' => 'AMD Ryzen 7 3700X',
            'core_processor_count' => '2',
            'ram' => '8',
            'unit_id' => $unit3->id
        ]);

        $server7 = Server::create([
            'name' => 'webserverfatisda',
            'server_type' => 'Physical',
            'status' => 'Active',
            'ip_address' => '192.168.2.1',
            'processor' => 'AMD Ryzen 5 3700X',
            'core_processor_count' => '4',
            'ram' => '16',
            'unit_id' => $unit4->id
        ]);

        $server8 = Server::create([
            'name' => 'mailserverfatisda',
            'server_type' => 'Virtual',
            'status' => 'No Active',
            'ip_address' => '192.168.2.2',
            'processor' => 'AMD Ryzen 7 3700X',
            'core_processor_count' => '2',
            'ram' => '8',
            'unit_id' => $unit4->id
        ]);

        $server9 = Server::create([
            'name' => 'webserverfh',
            'server_type' => 'Physical',
            'status' => 'Active',
            'ip_address' => '192.168.2.1',
            'processor' => 'AMD Ryzen 5 3700X',
            'core_processor_count' => '4',
            'ram' => '16',
            'unit_id' => $unit5->id
        ]);

        $server10 = Server::create([
            'name' => 'mailserverfh',
            'server_type' => 'Virtual',
            'status' => 'No Active',
            'ip_address' => '192.168.2.2',
            'processor' => 'AMD Ryzen 7 3700X',
            'core_processor_count' => '2',
            'ram' => '8',
            'unit_id' => $unit5->id
        ]);

        $server11 = Server::create([
            'name' => 'webserverfib',
            'server_type' => 'Physical',
            'status' => 'Active',
            'ip_address' => '192.168.2.1',
            'processor' => 'AMD Ryzen 5 3700X',
            'core_processor_count' => '4',
            'ram' => '16',
            'unit_id' => $unit6->id
        ]);

        $server12 = Server::create([
            'name' => 'mailserverfib',
            'server_type' => 'Virtual',
            'status' => 'No Active',
            'ip_address' => '192.168.2.2',
            'processor' => 'AMD Ryzen 7 3700X',
            'core_processor_count' => '2',
            'ram' => '8',
            'unit_id' => $unit6->id
        ]);

        $server13 = Server::create([
            'name' => 'webserverft',
            'server_type' => 'Physical',
            'status' => 'Active',
            'ip_address' => '192.168.2.1',
            'processor' => 'AMD Ryzen 5 3700X',
            'core_processor_count' => '4',
            'ram' => '16',
            'unit_id' => $unit7->id
        ]);

        $server14 = Server::create([
            'name' => 'mailserverft',
            'server_type' => 'Virtual',
            'status' => 'No Active',
            'ip_address' => '192.168.2.2',
            'processor' => 'AMD Ryzen 7 3700X',
            'core_processor_count' => '2',
            'ram' => '8',
            'unit_id' => $unit7->id
        ]);

        $server15 = Server::create([
            'name' => 'webserverfisip',
            'server_type' => 'Physical',
            'status' => 'Active',
            'ip_address' => '192.168.2.1',
            'processor' => 'AMD Ryzen 5 3700X',
            'core_processor_count' => '4',
            'ram' => '16',
            'unit_id' => $unit8->id
        ]);

        $server16 = Server::create([
            'name' => 'mailserverfisip',
            'server_type' => 'Virtual',
            'status' => 'No Active',
            'ip_address' => '192.168.2.2',
            'processor' => 'AMD Ryzen 7 3700X',
            'core_processor_count' => '2',
            'ram' => '8',
            'unit_id' => $unit8->id
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
