<?php

declare(strict_types=1);

namespace Database\Factories\Robot;

use App\Models\Robot\Robot;
use Database\Factories\BaseFactory;
use Illuminate\Support\Collection;

/**
 * @method Robot|Collection<Robot> create(array $attributes = [])
 * @method Robot|Collection<Robot> make(array $attributes = [])
 */
class RobotFactory extends BaseFactory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstNameFemale(),  // Because exactly today is International Women's Day…
        ];
    }
}
