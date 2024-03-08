<?php

declare(strict_types=1);

namespace App\Models\Robot;

use App\Models\BaseModel;

/**
 * Simple robot model.
 *
 * @property-read int $id
 * @property string $name
 * @property Type $type
 */
class Robot extends BaseModel
{
    protected $casts = [
        'type' => Type::class,
    ];
}
