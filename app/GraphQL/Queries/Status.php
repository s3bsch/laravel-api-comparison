<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Status extends BaseQuery
{
    public function __invoke(): array
    {
        return [
            'api' => true,
            'cache' => $this->cacheWorks(),
            'database' => $this->databaseWorks(),
        ];
    }

    private function cacheWorks(): bool
    {
        Cache::set('status', true);
        return Cache::get('status');
    }

    private function databaseWorks(): bool
    {
        $result = DB::selectOne('select true as status');

        return (bool) $result->status;
    }
}
