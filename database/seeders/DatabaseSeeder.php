<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Robot\Type;
use Database\Factories\Order\OrderFactory;
use Database\Factories\Robot\RobotFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // In a real world application it would be better to have dedicated seeder classes.
        //  For this prototype it should be good enough to keep everything in one place.

        $robotFactory = RobotFactory::new();

        $robotOne = $robotFactory->create(['type' => Type::ONE]);
        $robotFactory->create(['type' => Type::OCF]);
        $robotFactory->create(['type' => Type::ODM]);

        OrderFactory::new()
            ->forRobot($robotOne)
            ->create();
    }
}
