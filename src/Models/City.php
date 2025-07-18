<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed $id 18 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 2 occurrences
 * @property string|null $currency 2 occurrences
 * @property string|null $latitude 16 occurrences
 * @property string|null $longitude 16 occurrences
 * @property string|null $name_ar 18 occurrences
 * @property string|null $name_en 18 occurrences
 * @property string|null $phone_code 2 occurrences
 * @property string|null $sorting 2 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 2 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\CityFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City whereCurrency($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City whereLatitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City whereLongitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City whereNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City whereNameEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City wherePhoneCode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City whereSorting($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|City whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City withoutTrashed()
 * @mixin \Eloquent
 */
class City extends BaseModel
{
    use HasFactory;
    use Translatable;
    use SoftDeletes ;

    protected $fillable = [
        'name_ar', 'name_en', 'sorting', 'latitude', 'longitude', 'phone_code',
    ];
    protected $translatable = ['name'];
}
