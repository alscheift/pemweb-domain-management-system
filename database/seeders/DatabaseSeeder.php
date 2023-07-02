<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Domain;
use App\Models\DomainImages;
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

        $domain1 = Domain::create([
            'name' => 'Main Web Physics',
            'description' => 'Main Web Physics',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://physics.mipa.uns.ac.id',
            'user_id' => $user1->id,
            'server_id' => $server1->id
        ]);

        $domainImages1 = DomainImages::create([
            'domain_id' => $domain1->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain2 = Domain::create([
            'name' => 'Main Web Biology',
            'description' => 'Main Web Biology',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://biology.mipa.uns.ac.id',
            'user_id' => $user1->id,
            'server_id' => $server1->id
        ]);

        $domainImages2 = DomainImages::create([
            'domain_id' => $domain2->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain3 = Domain::create([
            'name' => 'Main Web Himabio Biology',
            'description' => 'Main Web Himabio Biology',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://himabio.mipa.uns.ac.id/',
            'user_id' => $user1->id,
            'server_id' => $server1->id
        ]);

        $domainImages3 = DomainImages::create([
            'domain_id' => $domain3->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain4 = Domain::create([
            'name' => 'Main Web Medical',
            'description' => 'Main Web Medical',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://prodikedokteran.fk.uns.ac.id/',
            'user_id' => $user2->id,
            'server_id' => $server3->id
        ]);

        $domainImages4 = DomainImages::create([
            'domain_id' => $domain4->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain5 = Domain::create([
            'name' => 'Main Web Kebidanan',
            'description' => 'Main Web Kebidanan',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://sarjanakebidanan.fk.uns.ac.id/',
            'user_id' => $user2->id,
            'server_id' => $server3->id
        ]);

        $domainImages5 = DomainImages::create([
            'domain_id' => $domain5->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain6 = Domain::create([
            'name' => 'Main Web Medical Specialization',
            'description' => 'Main Web Medical Specialization',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://ppds.fk.uns.ac.id/',
            'user_id' => $user2->id,
            'server_id' => $server3->id
        ]);

        $domainImages6 = DomainImages::create([
            'domain_id' => $domain6->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain7 = Domain::create([
            'name' => 'Main Web Education Indonesian Language',
            'description' => 'Main Web Education Indonesian Language',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://bastind.fkip.uns.ac.id/',
            'user_id' => $user3->id,
            'server_id' => $server5->id
        ]);

        $domainImages7 = DomainImages::create([
            'domain_id' => $domain7->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain8 = Domain::create([
            'name' => 'Main Web Historical Education',
            'description' => 'Main Web Historical Education',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://sejarah.fkip.uns.ac.id/',
            'user_id' => $user3->id,
            'server_id' => $server5->id
        ]);

        $domainImages8 = DomainImages::create([
            'domain_id' => $domain8->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain9 = Domain::create([
            'name' => 'Main Web Geografi Education',
            'description' => 'Main Web Geografi Education',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://geografi.fkip.uns.ac.id/',
            'user_id' => $user3->id,
            'server_id' => $server5->id
        ]);

        $domainImages9 = DomainImages::create([
            'domain_id' => $domain9->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain10 = Domain::create([
            'name' => 'Main Web Informatics',
            'description' => 'Main Web Informatics',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://if.fatisda.uns.ac.id/',
            'user_id' => $user4->id,
            'server_id' => $server7->id
        ]);

        $domainImages10 = DomainImages::create([
            'domain_id' => $domain10->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain11 = Domain::create([
            'name' => 'Main Web Himaster',
            'description' => 'Main Web Himaster',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://himaster.fatisda.uns.ac.id/',
            'user_id' => $user4->id,
            'server_id' => $server7->id
        ]);

        $domainImages11 = DomainImages::create([
            'domain_id' => $domain11->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain12 = Domain::create([
            'name' => 'Main Web Service FH',
            'description' => 'Main Web Service FH',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://layanan.hukum.uns.ac.id/',
            'user_id' => $user5->id,
            'server_id' => $server9->id
        ]);

        $domainImages12 = DomainImages::create([
            'domain_id' => $domain12->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain13 = Domain::create([
            'name' => 'Main Web Indonesian Literature',
            'description' => 'Main Web Indonesian Literature',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://bastind.fkip.uns.ac.id/',
            'user_id' => $user6->id,
            'server_id' => $server11->id
        ]);

        $domainImages13 = DomainImages::create([
            'domain_id' => $domain13->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain14 = Domain::create([
            'name' => 'Main Web Machine Engineering',
            'description' => 'Main Web Machine Engineering',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://mesin.ft.uns.ac.id/',
            'user_id' => $user7->id,
            'server_id' => $server13->id
        ]);

        $domainImages14 = DomainImages::create([
            'domain_id' => $domain14->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain15 = Domain::create([
            'name' => 'Main Web Architecture Engineering',
            'description' => 'Main Web Architecture Engineering',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://arsitektur.ft.uns.ac.id/',
            'user_id' => $user7->id,
            'server_id' => $server13->id
        ]);

        $domainImages15 = DomainImages::create([
            'domain_id' => $domain15->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain16 = Domain::create([
            'name' => 'Main Web Industrial Engineering',
            'description' => 'Main Web Industrial Engineering',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://industri.ft.uns.ac.id/',
            'user_id' => $user7->id,
            'server_id' => $server13->id
        ]);

        $domainImages16 = DomainImages::create([
            'domain_id' => $domain16->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain17 = Domain::create([
            'name' => 'Main Web International Relations',
            'description' => 'Main Web International Relations',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://hi.fisip.uns.ac.id/',
            'user_id' => $user8->id,
            'server_id' => $server15->id
        ]);

        $domainImages17 = DomainImages::create([
            'domain_id' => $domain17->id,
            'images' => 'domain_images/default-image.png'
        ]);

        $domain18 = Domain::create([
            'name' => 'Main Web public administration',
            'description' => 'Main Web public administration',
            'application_type' => 'Website',
            'port' => '80',
            'http_status' => 'Active',
            'url' => 'https://adneg.fisip.uns.ac.id/',
            'user_id' => $user8->id,
            'server_id' => $server15->id
        ]);

        $domainImages18 = DomainImages::create([
            'domain_id' => $domain18->id,
            'images' => 'domain_images/default-image.png'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
