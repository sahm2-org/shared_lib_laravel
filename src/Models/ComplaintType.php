<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Traits\Translatable;

/**
 * 
 *
 * @property mixed $id 17 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 17 occurrences
 * @property string|null $name_ar 17 occurrences
 * @property string|null $name_en 17 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 17 occurrences
 * @property string|null $user_type 17 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType whereNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType whereNameEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ComplaintType whereUserType($value)
 * @mixin \Eloquent
 */
class ComplaintType extends BaseModel
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['name'];
    protected $fillable = ['name_ar', 'name_en', 'user_type'];
}
