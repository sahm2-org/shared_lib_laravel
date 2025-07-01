<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use Saham\SharedLibs\Traits\Translatable;

/**
 * 
 *
 * @property mixed $id 22 occurrences
 * @property string|null $bic 22 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 22 occurrences
 * @property string|null $name_ar 22 occurrences
 * @property string|null $name_en 22 occurrences
 * @property string|null $sorting 22 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 22 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\BankFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank whereBic($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank whereNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank whereNameEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank whereSorting($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Bank whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank withoutTrashed()
 * @mixin \Eloquent
 */
class Bank extends BaseModel
{
    use HasFactory;
    use Translatable;
    use SoftDeletes ;

    protected $fillable = [
        'name_ar', 'name_en', 'sorting', 'bic', 'type',
    ];
    protected $translatable = ['name'];
}
