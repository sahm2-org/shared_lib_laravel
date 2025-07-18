<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\EmbedsMany;

/**
 * @property mixed $id 54 occurrences
 * @property string|null $feast_id 54 occurrences
 * @property string|null $feast_product_id 54 occurrences
 * @property int|null $quantity 54 occurrences
 * @property string|null $variations 32 occurrences
 * @property-read \Saham\SharedLibs\Models\FeastProduct|null $product
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails whereFeastId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails whereFeastProductId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails whereQuantity($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastDetails whereVariations($value)
 * @mixin \Eloquent
 */
class FeastDetails extends BaseModel
{
    use HasFactory;

    protected $with    = ['product'];
    public $timestamps = false;

    public function variations(): EmbedsMany
    {
        return $this->embedsMany(ProductVariation::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(FeastProduct::class, 'feast_product_id');
    }
}
