<?php

namespace Saham\SharedLibs\Models\Abstracts;

use MongoDB\Laravel\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Collection;
use Saham\SharedLibs\Traits\Trackable;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $id
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|BaseModel addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|BaseModel aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|BaseModel getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|BaseModel insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|BaseModel insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|BaseModel newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|BaseModel newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|BaseModel query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|BaseModel raw($value = null)
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    use Trackable;
    protected $connection = 'mongodb';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded    = [];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @return array<string>
     */
    protected function TableCols(): mixed
    {
        $table = $this->getTable();

        return DB::getSchemaBuilder()->getColumnListing($table);
    }

    public static function rawQueryWithPagination(array $aggr): Paginator
    {
        $total = (int) self::raw(static function ($collection) use ($aggr) {
            $aggr = array_merge($aggr, [
                ['$count' => 'count'],
            ]);

            return $collection->aggregate($aggr);
        })->first()?->toArray()['count'] ?? 0;

        if (!request()->has('per_page')) {
            request()->merge(['per_page' => 10]);
        } elseif (!is_numeric(request()->per_page) || (int) request()->per_page > 50) {
            // max per_page is 50
            request()->merge(['per_page' => 50]);
        }

        $currentPage = Paginator::resolveCurrentPage();
        $perPage     = (int) (request()->per_page && request()->per_page <= $total ? request()->per_page : $total);

        if ($perPage === 0) {
            $perPage = 1;
        }

        $results = self::raw(static function ($collection) use ($aggr, $perPage, $currentPage) {
            $aggr = array_merge($aggr, [
                ['$skip' => ($currentPage - 1) * $perPage],
                ['$limit' => $perPage],
            ]);

            return $collection->aggregate($aggr);
        });

        $resultsCollection = new Collection($results->all());
        $r                 = new Paginator($resultsCollection, $total, $perPage, $currentPage);

        return $r->setPath(request()->url())->withQueryString();
    }
}
