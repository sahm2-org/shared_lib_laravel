<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\EmbedsMany;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $order_id 1000 occurrences
 * @property string|null $product_id 1000 occurrences
 * @property string|null $product_object 970 occurrences
 * @property int|null $quantity 1000 occurrences
 * @property string|null $size_id 1000 occurrences
 * @property string|null $variations 204 occurrences
 * @property-read \Saham\SharedLibs\Models\Product|null $product
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail whereOrderId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail whereProductId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail whereProductObject($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail whereQuantity($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail whereSizeId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderDetail whereVariations($value)
 * @mixin \Eloquent
 */
class OrderDetail extends BaseModel
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
        return $this->belongsTo(Product::class);
    }

    // public function feastProduct(): BelongsTo
    // {
    //     return $this->belongsTo(FeastProduct::class);
    // }
}
