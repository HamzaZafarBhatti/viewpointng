<?php

namespace Database\Seeders;

use App\Models\Ui;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ui_design = [
            's6_title' => 'Powerful Mining Machine! Fast Hashrate! Unlimited Earning of GoldMint Coins',
            's7_title' => 'What our client say about us',
            's8_title' => 'Start Mining GoldMint Coin Today',
            's8_body' => 'Unlimited GOLDMINT COINS To MINE Out and Get as Revenue. All you have to do is to MINE DAILY, GET WITHDRAWALS DAILY. EARN Also through Referral Earnings (Affiliate Marketing), 
                            Sponsored Post Earning GoldMint Coin is the native cryptocurrency of the platform of GoldMint',
            's7_body' => 'Pulvinar neque laoreet suspendisse interdum consectetur libero id faucibus. Ac felis donec et odio pellentesque diam volutpat commodo. Tristique magna sit amet purus gravida quis blandit.',
            's7_image' => 'section4_1648123860.png',
            's6_body' => 'GoldMint is a robotized Mining platform machine used for mining, minting & cashing out the GoldMint Coin as revenue. We are a unique GoldMint Mining platform that everyone can successfully 
                        use which is intended for evaluating mining revenue and as well as the conversion of GOLDMINT COINS to real World Money & Cash which users can also exchange to their Bank Accounts. GoldMint 
                        Coin is the native cryptocurrency of the platform of GoldMint, among cryptocurrencies. GoldMint Coin Price (GMC): 1GMC = 1 NGN GOLDMINT - goldmintng.com - is owned, managed, and powered by 
                        HIPPO BUSINESS CENTER ENTERPRISE - BN2671904 - All staff and services operations included.',
            's5_title' => 'Frequently Asked Questions',
            's5_body' => 'Here you can find our top frequently asked questions. Please let us know if you have any queries regarding our GoldMint Mining platform such as enquiries, support, payments, and other stuffs.',
            's4_title' => 'Make plans for what to do, not what’s due.',
            's4_body' => 'Set up your recurring expenses (think power bill, cable, internet) in our app, and we\'ll do the work of saving for them each month. When you know your bills are covered, you can focus on the fun parts of having money—like saving for a trip to Japan and buying that new bike.',
            's4_image' => 'section3_1582269122.png',
            's3_title' => 'What are your goals?',
            's3_body' => 'Whatever stage of life you’re at, we can guide you through the opportunities and challenges you face. Your investment goals may be different, but here are some examples of the sort of questions our wealth planners can help you answer.',
            's3_image' => 'section2_1582269114.png',
            's2_image' => 'section1_1648118148.png',
            's2_title' => 'Investment Made Easy & Secure.',
            's2_body' => 'Bitclub, the first and safest crypto asset investment firm, was established to provide intelligent portfolios with its expert investors, customer-priority approach, safe and high-tech investment tools. Eliminating the risk factor to earn from digital assets, the platform is created to offer exclusive interest return. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per laoreet sit amet cursus seacula qui mutationem consuetudium claritas est etiam processus dynamicus',
            's1_title' => 'Market leaders use app to reach their brand & business.',
            'header_title' => 'Easy way to MINE GoldMint Coin',
            'header_body' => 'Unlimited Earning with the most powerful Hashrate!',
            'nav_type' => '1',
            'total_assets' => '1',
            'experience' => '15+',
            'traders' => '44+',
            'countries' => '1',
            'item1_title' => 'Register',
            'item1_body' => 'Only 1 minute and you\'re in. Enter the information you need to become a platform trader and start right away.',
            'item2_title' => 'Invest',
            'item2_body' => 'Invest and sit back. You can follow your investment status at any time and invest in limited time special offers.',
            'item3_title' => 'Cashout anytime',
            'item3_body' => 'Your investment is eligible to withdraw anytime after the first 24 hours.'
        ];
        Ui::create($ui_design);
    }
}
