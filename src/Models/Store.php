<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Models\Enums\DeliveryFee;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\BelongsToArray;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\HasOne;
use Saham\SharedLibs\Traits\HasNotes;
use Saham\SharedLibs\Traits\HasPaymentTypes;
use Saham\SharedLibs\Traits\HasWallet;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed                                                                                      $id                      1000 occurrences
 * @property string|null                                                                                $address                 943 occurrences
 * @property string|null                                                                                $allowed_payment_methods 949 occurrences
 * @property float|null                                                                                 $avg_rating              1000 occurrences
 * @property int|null                                                                                   $block                   860 occurrences
 * @property string|null                                                                                $brand                   940 occurrences
 * @property string|null                                                                                $brand_prefix            940 occurrences
 * @property string|null                                                                                $business_hours          1000 occurrences
 * @property string|null                                                                                $category_id             1000 occurrences
 * @property string|null                                                                                $city_id                 1000 occurrences
 * @property string|null                                                                                $code                    1000 occurrences
 * @property string|null                                                                                $cover                   999 occurrences
 * @property string|null                                                                                $coverURL                996 occurrences
 * @property \Illuminate\Support\Carbon|null                                                            $created_at              1000 occurrences
 * @property string|null                                                                                $cuisine_ids             1000 occurrences
 * @property \Illuminate\Support\Carbon|null                                                            $deleted_at              61 occurrences
 * @property string|null                                                                                $delivery                85 occurrences
 * @property string|null                                                                                $delivery_cost           3 occurrences
 * @property bool|null                                                                                  $delivery_cost_for_store 832 occurrences
 * @property string|null                                                                                $delivery_factor         832 occurrences
 * @property string|null                                                                                $desc                    497 occurrences
 * @property string|null                                                                                $desc_ar                 1000 occurrences
 * @property string|null                                                                                $desc_en                 1000 occurrences
 * @property string|null                                                                                $hotline                 1000 occurrences
 * @property string|null                                                                                $hotline_2               892 occurrences
 * @property string|null                                                                                $hotline_3               892 occurrences
 * @property string|null                                                                                $lat                     1 occurrences
 * @property float|null                                                                                 $latitude                999 occurrences
 * @property string|null                                                                                $lng                     1 occurrences
 * @property string|null                                                                                $location                1000 occurrences
 * @property string|null                                                                                $logo                    999 occurrences
 * @property string|null                                                                                $logoURL                 996 occurrences
 * @property string|null                                                                                $logo_thumb              998 occurrences
 * @property string|null                                                                                $logo_thumbURL           996 occurrences
 * @property float|null                                                                                 $longitude               999 occurrences
 * @property int|null                                                                                   $max_delivery_time       1000 occurrences
 * @property int|null                                                                                   $min_order_charge        1000 occurrences
 * @property string|null                                                                                $name                    497 occurrences
 * @property string|null                                                                                $name_ar                 1000 occurrences
 * @property string|null                                                                                $name_en                 1000 occurrences
 * @property string|null                                                                                $notes_history           800 occurrences
 * @property string|null                                                                                $panorama_id             2 occurrences
 * @property \Saham\SharedLibs\Models\Partner|null                                                      $partner                 18 occurrences
 * @property string|null                                                                                $partner_id              1000 occurrences
 * @property string|null                                                                                $pickup                  32 occurrences
 * @property string|null                                                                                $reservation             49 occurrences
 * @property string|null                                                                                $services                1000 occurrences
 * @property string|null                                                                                $status                  1000 occurrences
 * @property string|null                                                                                $store_bank_iban         947 occurrences
 * @property string|null                                                                                $store_bank_name         947 occurrences
 * @property string|null                                                                                $type                    973 occurrences
 * @property \Illuminate\Support\Carbon|null                                                            $updated_at              1000 occurrences
 * @property string|null                                                                                $wallet                  1000 occurrences
 * @property mixed                                                                                      $balance
 * @property \Saham\SharedLibs\Models\Category|null                                                     $category
 * @property \Saham\SharedLibs\Models\City|null                                                         $city
 * @property string                                                                                     $full_name
 * @property mixed|null                                                                                 $payment_types
 * @property \Saham\SharedLibs\Models\Manager|null                                                      $manager
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Menu>               $menus
 * @property int|null                                                                                   $menus_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Order>              $orders
 * @property int|null                                                                                   $orders_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Rating>             $ratings
 * @property int|null                                                                                   $ratings_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Banner>             $stories
 * @property int|null                                                                                   $stories_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\PartnerTransaction> $transactions
 * @property int|null                                                                                   $transactions_count
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\StoreFactory   factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     search($keyword)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereAddress($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereAllowedPaymentMethods($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereAvgRating($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereBlock($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereBrand($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereBrandPrefix($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereBusinessHours($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereCategoryId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereCityId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereCode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereCover($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereCoverURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereCuisineIds($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereDeletedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereDelivery($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereDeliveryCost($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereDeliveryCostForStore($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereDeliveryFactor($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereDesc($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereDescAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereDescEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereHotline($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereHotline2($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereHotline3($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereLat($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereLatitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereLng($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereLocation($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereLogo($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereLogoThumb($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereLogoThumbURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereLogoURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereLongitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereMaxDeliveryTime($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereMinOrderCharge($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereNameEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereNotesHistory($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     wherePanoramaId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     wherePartner($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     wherePartnerId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     wherePickup($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereReservation($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereServices($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereStoreBankIban($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereStoreBankName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     whereWallet($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store     withCommon(\Illuminate\Http\Request $request)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Store withoutTrashed()
 *
 * @property string|null $0 1 occurrences
 * @property string|null $1 1 occurrences
 * @property string|null $2 1 occurrences
 * @property string|null $3 1 occurrences
 * @property string|null $4 1 occurrences
 * @property string|null $5 1 occurrences
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store where0($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store where1($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store where2($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store where3($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store where4($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Store where5($value)
 *
 * @mixin \Eloquent
 */
class Store extends BaseModel
{
    use HasFactory;
    use Translatable;
    use HasWallet;
    use SoftDeletes;
    use HasPaymentTypes;
    use HasNotes ;

    protected $translatable = ['name', 'desc'];
    protected $attributes   = [
        'avg_rating'  => 4.9,
        'status'      => 'unavailable',
        'wallet'      => 0,
        'cuisine_ids' => [],
    ];
    protected $casts = [
        'latitude'          => 'double',
        'longitude'         => 'double',
        'max_delivery_time' => 'integer',
        'min_order_charge'  => 'integer',

    ];

    public function getFullNameAttribute(): string
    {
        return $this->name_ar . ' ' . $this->code;
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function manager(): HasOne
    {
        return $this->hasOne(Manager::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class, 'store_id');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'store_id');
    }

    public function cuisines(): BelongsToArray
    {
        return $this->belongsToArray(Cuisine::class, null, '_id', null, 'cuisine_ids');
    }

    public function scopeSearch($query, $keyword): void
    {
        $query->whereLike(['name_ar', 'name_en'], $keyword);
    }

    public function getCoupons(): ?Coupon
    {
        return Coupon::where('partner_ids', 'all', [$this->partner_id])
            ->where('display_public', '1')
            ->whereDate('promo_date_range.start', '<=', now())
            ->whereDate('promo_date_range.end', '>=', now())
            ->orderByDesc('created_at')->first();
    }

    public function getActiveCoupons(): mixed
    {
        return Coupon::where('partner_ids', 'all', [$this->partner_id])
            ->where('show_first', '1')
            ->whereDate('promo_date_range.start', '<=', now())
            ->whereDate('promo_date_range.end', '>=', now())
            ->orderByDesc('created_at')
            ->orderByDesc('show_first')
            ->get();
    }

    public function getFavorites(): ?int
    {
        return Favorite::where('store_id', $this->_id)->count();
    }

    public function stories(): HasMany
    {
        return $this->hasMany(Banner::class, 'store_id');
    }

    public function runningStories(): mixed
    {
        return $this->stories()->where('image', null)->whereDate('banner_date_range.end', '>=', now());
    }

    public function scopeWithCommon($query, Request $request): void
    {
        $query->when($request->delivery_fee === 'Free', static function ($query): void {
            $query->whereHas('partner', static function ($query): void {
                $query->where('delivery_fee', DeliveryFee::Free->value);
            });
        })
            ->when($request->category_id, static function ($query) use ($request): void {
                $query->where('category_id', $request->category_id);
            })
            ->when($request->cuisine_id, static function ($query) use ($request): void {
                $query->whereHas('partner', static function ($query) use ($request): void {
                    $query->where('cuisine_ids', 'all', [$request->cuisine_id]);
                });
            });
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function transactions(): mixed
    {
        return $this->hasMany(PartnerTransaction::class)
            ->orderByDesc('created_at');
    }

    public function acceptsService(string $deliver_type): bool
    {
        // if ($deliver_type === 'delivery') {
        //     return $this->services['delivery'];
        // }

        // if ($deliver_type === 'receipt') {
        //     return $this->services['pickup'];
        // }

        // if ($deliver_type === 'reservation') {
        //     return $this->services['reservation'];
        // }
        return getStoreServices($this, true)[$deliver_type] ?? true;
    }

    public function updateStoreService($pickup = null, $delivery = null, $feasts = null, $reservation = null): mixed
    {
        $services = $this->services;

        if ($pickup !== null) {
            $services['pickup'] = $pickup === true || $pickup === 1;
        }

        if ($delivery !== null) {
            $services['delivery'] = $delivery === true || $delivery === 1;
        }

        if ($feasts !== null) {
            $services['feasts'] = $feasts === true || $feasts === 1;
        }

        if ($reservation !== null) {
            $services['reservation'] = $reservation === true || $reservation === 1;
        }

        return   $this->update(['services' => $services]);
    }
}
