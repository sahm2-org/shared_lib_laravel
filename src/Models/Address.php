<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;
use Saham\SharedLibs\Traits\Translatable;
use Spatie\Geocoder\Facades\Geocoder;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $adress_name 140 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $formatted_address_ar 666 occurrences
 * @property string|null $formatted_address_en 666 occurrences
 * @property float|null $latitude 1000 occurrences
 * @property float|null $longitude 1000 occurrences
 * @property string|null $type 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property string|null $user_id 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\AddressFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereAdressName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereFormattedAddressAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereFormattedAddressEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereLatitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereLongitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Address whereUserId($value)
 * @mixin \Eloquent
 */
class Address extends BaseModel
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['formatted_address'];

    protected $casts = [
        'latitude'  => 'double',
        'longitude' => 'double',
    ];

    public function setFormattedAddressArAttribute($value = null): void
    {
        $this->attributes['formatted_address_ar'] = Geocoder::setLanguage('ar')
        ->getAddressForCoordinates($this->latitude, $this->longitude)['formatted_address'];
    }

    public function setFormattedAddressEnAttribute($value = null): void
    {
        $this->attributes['formatted_address_en'] = Geocoder::setLanguage('en')
        ->getAddressForCoordinates($this->latitude, $this->longitude)['formatted_address'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
