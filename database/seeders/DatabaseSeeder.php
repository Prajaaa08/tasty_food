<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::factory()->create([
            'name' => 'Super Admin',
            'news_access' => true,
            'menu_access' => true,
            'about_us_access' => true,
            'about_us_gallery_access' => true,
            'slider_gallery_access' => true,
            'gallery_access' => true,
            'contact_access' => true,
            'business_information_access' => true,
            'users_access' => true,
            'role_access' => true,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'role_id' => 1, // Assuming the first role is 'Super Admin'
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        DB::table('business_information')->insert([
            'phone'     => '+62 812-3456-7890',
            'email'     => 'info@tastyfood.com',
            'location'  => 'Jl. Mawar No. 123, Jakarta',
            'latitude'  => -6.200000,
            'longitude' => 106.816666,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Buat data about us (3 posisi: atas, tengah, bawah)
        DB::table('about_us')->insert([
            [
                'title' => 'Tentang Kami - Atas',
                'content' => 'Bagian atas dari tentang kami. Informasi umum tentang TastyFood.',
                'position' => 'atas',
                'photo_kiri' => 'about_us/atas_kiri.jpg',
                'photo_kanan' => 'about_us/atas_kanan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tentang Kami - Tengah',
                'content' => 'Bagian tengah dari tentang kami. Visi dan misi perusahaan.',
                'position' => 'tengah',
                'photo_kiri' => 'about_us/tengah_kiri.jpg',
                'photo_kanan' => 'about_us/tengah_kanan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tentang Kami - Bawah',
                'content' => 'Bagian bawah dari tentang kami. Cerita dan nilai kami.',
                'position' => 'bawah',
                'photo_kiri' => 'about_us/bawah_kiri.jpg',
                'photo_kanan' => 'about_us/bawah_kanan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
