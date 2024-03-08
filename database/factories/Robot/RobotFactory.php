<?php

declare(strict_types=1);

namespace Database\Factories\Robot;

use App\Models\Robot\Robot;
use App\Models\Robot\Type;
use Database\Factories\BaseFactory;
use Illuminate\Support\Collection;

/**
 * @method Robot|Collection<Robot> create(array $attributes = [])
 * @method Robot|Collection<Robot> make(array $attributes = [])
 */
class RobotFactory extends BaseFactory
{
    public static function empty(int $id = null): Robot
    {
        $robot = new Robot();
        $robot->setAttribute('id', $id);

        return $robot;
    }

    public static function loadAny(array $columns = null): Robot
    {
        $columns ??= ['id'];

        return Robot::firstOrFail($columns);
    }

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstNameFemale(),  // Because exactly today is International Women's Day…
            'type' => Type::ONE,
        ];
    }
}
