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
 * @property mixed $id 1000 occurrences
 * @property string|null $feast_product_id 6 occurrences
 * @property string|null $max 1000 occurrences
 * @property string|null $min 1000 occurrences
 * @property string|null $options 1000 occurrences
 * @property float|null $price 1 occurrences
 * @property string|null $product_id 1000 occurrences
 * @property string|null $title 979 occurrences
 * @property string|null $title_ar 1000 occurrences
 * @property string|null $title_en 1000 occurrences
 * @property string|null $type 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Product|null $product
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\ProductVariationFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereFeastProductId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereMax($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereMin($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereOptions($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation wherePrice($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereProductId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereTitle($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereTitleAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereTitleEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ProductVariation whereType($value)
 * @mixin \Eloquent
 */
class ProductVariation extends BaseModel
{
    use HasFactory;
    use Translatable;

    public $timestamps      = false;
    protected $translatable = ['title'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function options(): EmbedsMany
    {
        return $this->embedsMany(VariationOption::class);
    }
}
