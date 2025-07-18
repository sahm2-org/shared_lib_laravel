<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $avatar 992 occurrences
 * @property string|null $avatarURL 999 occurrences
 * @property string|null $chagnes 8 occurrences
 * @property string|null $changes 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $desc 923 occurrences
 * @property string|null $desc_ar 1000 occurrences
 * @property string|null $desc_en 1000 occurrences
 * @property string|null $display_order 971 occurrences
 * @property bool|null $is_box 782 occurrences
 * @property string|null $menu_id 1000 occurrences
 * @property string|null $old_status 122 occurrences
 * @property string|null $price 1000 occurrences
 * @property string|null $sizes 1000 occurrences
 * @property string|null $status 1000 occurrences
 * @property string|null $thumb 331 occurrences
 * @property string|null $thumbURL 999 occurrences
 * @property string|null $title 923 occurrences
 * @property string|null $title_ar 1000 occurrences
 * @property string|null $title_en 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Menu|null $menu
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\ProductVariation> $variations
 * @property-read int|null $variations_count
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product availableOnly()
 * @method static \Saham\SharedLibs\Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereAvatar($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereAvatarURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereChagnes($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereChanges($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereDesc($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereDescAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereDescEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereDisplayOrder($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereIsBox($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereMenuId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereOldStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product wherePrice($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereSizes($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereThumb($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereThumbURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereTitle($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereTitleAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereTitleEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Driver> $ratings
 * @property-read int|null $ratings_count
 * @mixin \Eloquent
 */
class Product extends BaseModel
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['title', 'desc'];

    protected $guarded = [];

    public function variations(): mixed
    {
        return $this->hasMany(ProductVariation::class, 'product_id', '_id');
    }

    public function menu(): mixed
    {
        return $this->belongsTo(Menu::class);
    }

    public function sizes(): mixed
    {
        return $this->embedsMany(Size::class);
    }

    public function scopeAvailableOnly($query): void
    {
        $query->where('status', 'available');
    }

    public function logProductPriceUpdate($thing_name, $thing_price_from, $thing_price_to, $status_from = null): void
    {

        self::withoutEvents(function () use ($thing_name, $thing_price_from, $thing_price_to, $status_from): void {
            $this->push('changes', [
                'price_from' => $thing_price_from,
                'price_to' => $thing_price_to,
                'status_from' => $status_from,
                'status_to' => 'pending',
                'item' => $thing_name,
            ], false);

            $this->update([
                'status' => 'pending',
            ]);
        });
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Driver::class, 'related_id')->where('related_type', Product::class);
    }
}
