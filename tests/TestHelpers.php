<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;

/**
 * A collection of methods to improve testing experience.
 */
trait TestHelpers
{
    private static bool $countDatabaseQueries = false;

    private static int $databaseQueriesCount = 0;

    private static bool $dumpDatabaseQueries = false;

    /**
     * Count database queries executed after this method was called.
     *
     * ⚠️You should never commit tests using this method, but it's super helpful for debugging purposes.
     */
    protected function countDatabaseQueries(): void
    {
        if (self::$countDatabaseQueries) {
            return;
        }

        self::$countDatabaseQueries = true;

        DB::listen(function () {
            self::$databaseQueriesCount++;
        });

        $this->beforeApplicationDestroyed(function () {
            dump('Database query count: ' . self::$databaseQueriesCount);
        });
    }

    /**
     * Dump attributes of model.
     *
     * ⚠️You should never commit tests using this method, but it's super helpful for debugging purposes.
     */
    protected function dumpAttributes(Model|null $model): void
    {
        if ($model === null) {
            dump('Given model is `null`.');
        } else {
            $attributes = $model->getAttributes();
            dump($attributes);
        }
    }

    /**
     * Dump attributes of collection of models.
     *
     * ⚠️You should never commit tests using this method, but it's super helpful for debugging purposes.
     */
    protected function dumpAttributesOfCollection(EloquentCollection $models): void
    {
        if ($models->isEmpty()) {
            dump('Given list is empty.');
        } else {
            $models->each(fn($model) => $this->dumpAttributes($model));
        }
    }

    /**
     * Expect no database query after running this method, otherwise the test will fail.
     */
    protected function expectNoDatabaseQueries(): void
    {
        DB::listen(function (QueryExecuted $query) {
            $this->fail('Unexpected database query detected: ' . $query->sql);
        });

        $this->addToAssertionCount(1);
    }

    /**
     * Log database queries during test, right after they were executed.
     *
     * ⚠️You should never commit tests using this method, but sometimes during development it helps to get a glue,
     * what actually is happening under the hood.
     */
    protected function logDatabaseQueries(bool $bindings = false): void
    {
        if (self::$dumpDatabaseQueries) {
            return;
        }

        self::$dumpDatabaseQueries = true;

        DB::listen(function (QueryExecuted $query) use ($bindings) {
            $msg = sprintf('%s (%d ms)', $query->sql, $query->time);
            dump($msg);

            if ($bindings) {
                dump($query->bindings);
            }
        });
    }
}
