<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Base of all models.
 *
 * @method static static findOrFail(mixed $id, array $columns = ['*'])
 * @method static static firstOrFail(array $columns = ['*'])
 */
abstract class BaseModel extends Model
{
}
