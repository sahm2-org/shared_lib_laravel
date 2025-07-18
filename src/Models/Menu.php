<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\HasOne;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed $id 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $deleted_at 711 occurrences
 * @property string|null $display_order 735 occurrences
 * @property string|null $partner_id 601 occurrences
 * @property string|null $store_id 987 occurrences
 * @property string|null $title 873 occurrences
 * @property string|null $title_ar 1000 occurrences
 * @property string|null $title_en 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\FeastProduct> $feastProducts
 * @property-read int|null $feast_products_count
 * @property-read \Saham\SharedLibs\Models\Partner|null $partner
 * @property-read \Saham\SharedLibs\Models\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Store> $stores
 * @property-read int|null $stores_count
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\MenuFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu whereDeletedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu whereDisplayOrder($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu wherePartnerId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu whereTitle($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu whereTitleAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu whereTitleEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu withoutTrashed()
 * @mixin \Eloquent
 */
class Menu extends BaseModel
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected $translatable = ['title'];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class, 'partner_id', 'partner_id');
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function feastProducts(): HasMany
    {
        return $this->hasMany(FeastProduct::class);
    }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
