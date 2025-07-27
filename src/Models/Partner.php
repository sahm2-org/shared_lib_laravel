<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\BelongsToArray;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\Traits\HasNotes;
use Saham\SharedLibs\Traits\HasTransaction;
use Saham\SharedLibs\Traits\HasWallet;
use Saham\SharedLibs\Traits\Translatable;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Saham\SharedLibs\Traits\Notifiable;

/**
 * @property mixed                                                                                                        $id                            824 occurrences
 * @property string|null                                                                                                  $account_status                192 occurrences
 * @property string|null                                                                                                  $address                       585 occurrences
 * @property bool|null                                                                                                    $app_percentage_is_without_vat 585 occurrences
 * @property string|null                                                                                                  $bank_IBAN                     726 occurrences
 * @property string|null                                                                                                  $bank_name                     730 occurrences
 * @property string|null                                                                                                  $block                         809 occurrences
 * @property bool|null                                                                                                    $block_from_coupon             818 occurrences
 * @property string|null                                                                                                  $business_hours                824 occurrences
 * @property string|null                                                                                                  $category_id                   824 occurrences
 * @property string|null                                                                                                  $city_id                       731 occurrences
 * @property string|null                                                                                                  $commercial_ID                 824 occurrences
 * @property string|null                                                                                                  $commercial_file               560 occurrences
 * @property string|null                                                                                                  $commercial_fileURL            287 occurrences
 * @property string|null                                                                                                  $company_name_ar               824 occurrences
 * @property string|null                                                                                                  $company_name_en               824 occurrences
 * @property string|null                                                                                                  $cover                         563 occurrences
 * @property string|null                                                                                                  $coverURL                      820 occurrences
 * @property \Illuminate\Support\Carbon|null                                                                              $created_at                    824 occurrences
 * @property string|null                                                                                                  $cuisine_ids                   824 occurrences
 * @property string|null                                                                                                  $custom_commission             615 occurrences
 * @property string|null                                                                                                  $deleted_at                    129 occurrences
 * @property string|null                                                                                                  $device_id                     778 occurrences
 * @property string|null                                                                                                  $device_type                   778 occurrences
 * @property string|null                                                                                                  $email                         824 occurrences
 * @property string|null                                                                                                  $fcm_token                     632 occurrences
 * @property string|null                                                                                                  $full_name                     824 occurrences
 * @property string|null                                                                                                  $language                      370 occurrences
 * @property string|null                                                                                                  $logo                          562 occurrences
 * @property string|null                                                                                                  $logoURL                       820 occurrences
 * @property string|null                                                                                                  $logo_thumb                    544 occurrences
 * @property string|null                                                                                                  $logo_thumbURL                 820 occurrences
 * @property string|null                                                                                                  $notes_history                 139 occurrences
 * @property string|null                                                                                                  $notification_id               778 occurrences
 * @property string|null                                                                                                  $os_version                    778 occurrences
 * @property string|null                                                                                                  $password                      824 occurrences
 * @property string|null                                                                                                  $phone                         824 occurrences
 * @property string|null                                                                                                  $status                        824 occurrences
 * @property string|null                                                                                                  $status_acount                 27 occurrences
 * @property string|null                                                                                                  $tax_number                    601 occurrences
 * @property \Illuminate\Support\Carbon|null                                                                              $updated_at                    824 occurrences
 * @property string|null                                                                                                  $wallet                        550 occurrences
 * @property mixed                                                                                                        $balance
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\CashoutMethods>                       $cashoutMethods
 * @property int|null                                                                                                     $cashout_methods_count
 * @property \Saham\SharedLibs\Models\Category|null                                                                       $category
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Client>                      $clients
 * @property int|null                                                                                                     $clients_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Menu>                                 $menus
 * @property int|null                                                                                                     $menus_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Modifier>                             $modifier
 * @property int|null                                                                                                     $modifier_count
 * @property \Illuminate\Notifications\DatabaseNotificationCollection<int, \Saham\SharedLibs\Models\DatabaseNotification> $notifications
 * @property int|null                                                                                                     $notifications_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Order>                                $orders
 * @property int|null                                                                                                     $orders_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\PartnerVatInvoice>                    $partnerInvoices
 * @property int|null                                                                                                     $partner_invoices_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\PartnerPayout>                        $payouts
 * @property int|null                                                                                                     $payouts_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Store>                                $stores
 * @property int|null                                                                                                     $stores_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Token>                       $tokens
 * @property int|null                                                                                                     $tokens_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\PartnerTransaction>                   $transactions
 * @property int|null                                                                                                     $transactions_count
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\PartnerFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereAccountStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereAddress($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereAppPercentageIsWithoutVat($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereBankIBAN($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereBankName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereBlock($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereBlockFromCoupon($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereBusinessHours($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCategoryId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCityId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCommercialFile($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCommercialFileURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCommercialID($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCompanyNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCompanyNameEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCover($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCoverURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCuisineIds($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereCustomCommission($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereDeletedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereDeviceId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereDeviceType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereEmail($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereFcmToken($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereFullName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereLanguage($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereLogo($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereLogoThumb($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereLogoThumbURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereLogoURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereNotesHistory($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereNotificationId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereOsVersion($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   wherePassword($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   wherePhone($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereStatusAcount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereTaxNumber($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Partner   whereWallet($value)
 *
 * @mixin \Eloquent
 */
class Partner extends Authenticatable
{
    use AuthenticatableTrait;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Translatable;
    use HasWallet;
    use HasTransaction;
    use HasNotes;

    protected $translatable = ['company_name'];

    protected $guarded    = [];
    protected $attributes = [
        'status'      => 'under_revision',
        'cuisine_ids' => [],
    ];
    protected $hidden = ['remember_token', 'password'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'custom_commission',
        'password',
        'category_id',
        'address',
        'city_id',
        'bank_name',
        'bank_IBAN',
        'company_name_ar',
        'company_name_en',
        'commercial_ID',
        'logo',
        'app_percentage_is_without_vat',
        'cover',
        'language',
        'logo_thumb',

        'logoURL',
        'coverURL',
        'language',
        'logo_thumbURL',
        'block_from_coupon',
        'commercial_file',
        'commercial_fileURL',
        'account_status',
        'block',
        'status',
        'notification_id',
        'device_id',
        'device_type',
        'os_version',
        'tax_number',
    ];

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function findForPassport($username): ?self
    {
        return $this->where('phone', $username)->first();
    }

    public function routeNotificationForSms($notifiable): string
    {
        return $this->phone;
    }

    public function routeNotificationForFcm($notifiable): string
    {
        return $this->notification_id;
    }

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    public function partnerInvoices(): HasMany
    {
        return $this->hasMany(PartnerVatInvoice::class);
    }

    public function modifier(): HasMany
    {
        return $this->hasMany(Modifier::class);
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

    public function cuisines(): BelongsToArray
    {
        return $this->belongsToArray(Cuisine::class, null, '_id', null, 'cuisine_ids');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function payouts(): HasMany
    {
        return $this->hasMany(PartnerPayout::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function validateForPassportPasswordGrant($password): bool
    {
        return Hash::check($password, $this->password);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(PartnerTransaction::class)
            ->orderByDesc('created_at');
    }

    public function cashoutMethods(): HasMany
    {
        return $this->hasMany(CashoutMethods::class, 'related_id', '_id')->where('related_type', self::class);
    }
}
