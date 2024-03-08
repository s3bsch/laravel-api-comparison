<?php

declare(strict_types=1);

namespace App\Models\Order;

use App\Models\BaseModel;
use App\Models\Robot\Robot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Simple order model.
 *
 * @property-read int $id
 * @property string $payload Some JSON payload
 * @property-read int $robot_id
 * @property-read Robot $robot
 */
class Order extends BaseModel
{
    /*
     * Relations:
     */

    public function robot(): BelongsTo
    {
        return $this->belongsTo(Robot::class);
    }
}
