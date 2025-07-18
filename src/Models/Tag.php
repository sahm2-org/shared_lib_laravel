<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed $id 6 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 6 occurrences
 * @property string|null $name_ar 6 occurrences
 * @property string|null $name_en 6 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 6 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag whereNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag whereNameEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends BaseModel
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['name'];
    protected $fillable = ['name_ar', 'name_en'];
}
