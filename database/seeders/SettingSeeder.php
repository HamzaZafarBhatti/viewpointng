<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, sit',
            'site_name' => 'ViewPoint NG',
            'site_desc' => 'nobis iure laborum!',
            'email' => 'support@rubicnetwork.com',
            'mobile' => '+2347087394692',
            'address' => 'NBCC Plaza, Olubunmi Owa Street, Lekki Phase 1, Lekki, Lagos.',
            'upgrade_fee' => 0,
        ]);
    }
}
