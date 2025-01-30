<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reward::insert([
            [
                'name' => 'Amazon Gift Card',
                'description' => 'A $10 Amazon gift card.',
                'points_required' => 500
            ],
            [
                'name' => 'Spotify Premium 1 Month',
                'description' => 'Get one month of Spotify Premium for free!',
                'points_required' => 300
            ],
            [
                'name' => 'Netflix Subscription 1 Month',
                'description' => 'Enjoy 1 month of Netflix on us!',
                'points_required' => 700
            ],
        ]);
    }
}
