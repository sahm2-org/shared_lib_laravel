<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\EmbedsMany;
use Saham\SharedLibs\Traits\Translatable;

/**
 * 
 *
 * @property mixed $id 142 occurrences
 * @property string|null $max 142 occurrences
 * @property string|null $min 142 occurrences
 * @property string|null $options 137 occurrences
 * @property string|null $partner_id 142 occurrences
 * @property string|null $title_ar 142 occurrences
 * @property string|null $title_en 142 occurrences
 * @property string|null $type 142 occurrences
 * @property-read \Saham\SharedLibs\Models\Partner|null $partner
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier whereMax($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier whereMin($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier whereOptions($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier wherePartnerId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier whereTitleAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier whereTitleEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Modifier whereType($value)
 * @mixin \Eloquent
 */
class Modifier extends BaseModel
{
    use HasFactory;
    use Translatable;

    public $timestamps      = false;
    protected $translatable = ['title'];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function options(): EmbedsMany
    {
        return $this->embedsMany(ModifierOption::class);
    }
}
