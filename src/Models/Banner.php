<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $banner_date_range 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $lang 1000 occurrences
 * @property string|null $link 1000 occurrences
 * @property string|null $mime_type 1000 occurrences
 * @property string|null $store_id 1000 occurrences
 * @property string|null $story 1000 occurrences
 * @property string|null $storyURL 260 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property string|null $view_only 815 occurrences
 * @property-write mixed $image
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\BannerFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereBannerDateRange($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereLang($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereLink($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereMimeType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereStory($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereStoryURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereViewOnly($value)
 * @property string|null $thump 1 occurrences
 * @property string|null $view_location 1 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereImage($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereThump($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Banner whereViewLocation($value)
 * @mixin \Eloquent
 */
class Banner extends BaseModel
{
    use HasFactory;

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function setImageAttribute($value): void
    {
        $data                          = storeImageWithThumb($value, 'Banner', 'Image');
        $this->attributes['thump']     = $data['thumb'];
        $this->attributes['image']     = $data['path'];
        $this->attributes['mime_type'] = $value->getClientMimeType() ?? 'image/jpeg';
    }

    public function setStoryAttribute($value): void
    {
        $data                          = storeFile($value, 'Stories', 'Story');
        $this->attributes['story']     = $data;
        $this->attributes['mime_type'] = $value->getClientMimeType() ?? 'video/mp4';
    }
}
