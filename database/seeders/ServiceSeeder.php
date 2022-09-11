<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $services = [
            [
                'title' => '1. Register with Activation PIN Code',
                'icon' => 'shopping-cart',
                'details' => 'Get your Activation PIN CODE from our Activation PIN Code Retailers nationwide for any plan depending on your Mining Hashrate/ power you want to register with.'
            ],
            [
                'title' => '2. Create Account',
                'icon' => 'user-plus',
                'details' => 'Create your secured GoldMint user profile for yourself using your primary details and get ready to start mining.'
            ],
            [
                'title' => '3. Start Mining',
                'icon' => 'hourglass-start',
                'details' => 'Now you are ready to mine! Start Mining On-The-Go with your Mining Power/ Machine. You can always increase your Mining Power from the Upgrade Page at anytime by changing your Plan. Mine All the GoldMint Coins as much as you want.'
            ],
            [
                'title' => 'Get Mined Output to Bank',
                'icon' => 'university',
                'details' => 'You will receive your mining output from your GoldMint Coin wallet. Try our GoldMint mining platform now!'
            ]
        ];
        foreach($services as $service) {
            Service::create($service);
        }
    }
}
