<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $social_links = array(
            array('id' => '1', 'type' => 'facebook', 'value' => 'https://facebook.com/goldmintng/', 'created_at' => '2022-03-29 19:51:04', 'updated_at' => '2022-03-29 23:51:04'),
            array('id' => '2', 'type' => 'instagram', 'value' => NULL, 'created_at' => '2022-03-26 20:23:40', 'updated_at' => '2022-03-27 00:23:40'),
            array('id' => '3', 'type' => 'twitter', 'value' => NULL, 'created_at' => '2022-03-26 20:23:16', 'updated_at' => '2022-03-27 00:23:16'),
            array('id' => '4', 'type' => 'telegram', 'value' => 'https://t.me/goldmintng', 'created_at' => '2022-03-29 00:19:41', 'updated_at' => '2022-03-29 04:19:41'),
            array('id' => '5', 'type' => 'facebook', 'value' => 'https://facebook.com/groups/goldmintng', 'created_at' => '2022-03-29 19:17:22', 'updated_at' => '2022-03-29 23:17:22'),
            array('id' => '7', 'type' => 'linkedin', 'value' => NULL, 'created_at' => '2020-02-16 04:00:07', 'updated_at' => '2020-02-16 03:00:07'),
            array('id' => '8', 'type' => 'youtube', 'value' => 'https://www.youtube.com/channel/UCmL1RHK-c26F0jtJcT1RxNQ', 'created_at' => '2022-03-31 12:01:38', 'updated_at' => '2022-03-31 16:01:38'),
            array('id' => '9', 'type' => 'whatsapp', 'value' => 'https://api.whatsapp.com/send?phone=2347087394692', 'created_at' => '2022-03-26 20:23:03', 'updated_at' => '2022-03-27 00:23:03')
        );

        Social::insert($social_links);
    }
}
