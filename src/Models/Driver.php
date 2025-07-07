<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Saham\SharedLibs\Models\Enums\OrderStatus;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\Traits\HasNotes;
use Saham\SharedLibs\Traits\HasTransaction;
use Saham\SharedLibs\Traits\HasWallet;
use Saham\SharedLibs\Traits\Translatable;
use MongoDB\Laravel\Auth\User as Authenticatable;

/**
 * @property string|null                                                                                                  $ID                    167 occurrences
 * @property string|null                                                                                                  $ID_number             955 occurrences
 * @property string|null                                                                                                  $ID_photo              1000 occurrences
 * @property mixed                                                                                                        $id                    1000 occurrences
 * @property string|null                                                                                                  $account_status        52 occurrences
 * @property string|null                                                                                                  $bank_IBAN             860 occurrences
 * @property string|null                                                                                                  $bank_name             860 occurrences
 * @property string|null                                                                                                  $block                 336 occurrences
 * @property string|null                                                                                                  $car_back              1000 occurrences
 * @property string|null                                                                                                  $car_front             1000 occurrences
 * @property string|null                                                                                                  $car_register          1000 occurrences
 * @property string|null                                                                                                  $city_id               1000 occurrences
 * @property int|null                                                                                                     $code                  249 occurrences
 * @property \Illuminate\Support\Carbon|null                                                                              $created_at            1000 occurrences
 * @property string|null                                                                                                  $deleted_at            7 occurrences
 * @property string|null                                                                                                  $device_id             992 occurrences
 * @property string|null                                                                                                  $device_type           992 occurrences
 * @property string|null                                                                                                  $email                 1000 occurrences
 * @property string|null                                                                                                  $full_name             1000 occurrences
 * @property string|null                                                                                                  $gender                135 occurrences
 * @property string|null                                                                                                  $hiring_type           170 occurrences
 * @property string|null                                                                                                  $latitude              368 occurrences
 * @property string|null                                                                                                  $license               1000 occurrences
 * @property string|null                                                                                                  $location              995 occurrences
 * @property string|null                                                                                                  $longitude             368 occurrences
 * @property string|null                                                                                                  $notes_history         5 occurrences
 * @property string|null                                                                                                  $notification_id       992 occurrences
 * @property string|null                                                                                                  $operation_mamanger_id 1 occurrences
 * @property string|null                                                                                                  $operation_manger_id   174 occurrences
 * @property string|null                                                                                                  $os_version            992 occurrences
 * @property string|null                                                                                                  $password              1000 occurrences
 * @property string|null                                                                                                  $phone                 1000 occurrences
 * @property string|null                                                                                                  $services              708 occurrences
 * @property string|null                                                                                                  $status                1000 occurrences
 * @property \Illuminate\Support\Carbon|null                                                                              $updated_at            1000 occurrences
 * @property string|null                                                                                                  $wallet                256 occurrences
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Order>                                $activeOrder
 * @property int|null                                                                                                     $active_order_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\DriverAssignment>                     $assignments
 * @property int|null                                                                                                     $assignments_count
 * @property mixed                                                                                                        $balance
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\CashoutMethods>                       $cashoutMethods
 * @property int|null                                                                                                     $cashout_methods_count
 * @property \Saham\SharedLibs\Models\City|null                                                                           $city
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Client>                      $clients
 * @property int|null                                                                                                     $clients_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Complaint>                            $complains
 * @property int|null                                                                                                     $complains_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Message>                              $messages
 * @property int|null                                                                                                     $messages_count
 * @property \Illuminate\Notifications\DatabaseNotificationCollection<int, \Saham\SharedLibs\Models\DatabaseNotification> $notifications
 * @property int|null                                                                                                     $notifications_count
 * @property \Saham\SharedLibs\Models\Operational|null                                                                    $operational
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Order>                                $orders
 * @property int|null                                                                                                     $orders_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\DriverPayout>                         $payouts
 * @property int|null                                                                                                     $payouts_count
 * @property \Illuminate\Database\Eloquent\Collection<int, Driver>                                                        $ratings
 * @property int|null                                                                                                     $ratings_count
 * @property mixed                                                                                                        $i_d_photo
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Token>                       $tokens
 * @property int|null                                                                                                     $tokens_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\DriverTransaction>                    $transactions
 * @property int|null                                                                                                     $transactions_count
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\DriverFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereAccountStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereBankIBAN($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereBankName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereBlock($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereCarBack($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereCarFront($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereCarRegister($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereCityId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereCode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereDeletedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereDeviceId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereDeviceType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereEmail($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereFullName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereGender($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereHiringType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereID($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereIDNumber($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereIDPhoto($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereLatitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereLicense($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereLocation($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereLongitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereNotesHistory($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereNotificationId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereOperationMamangerId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereOperationMangerId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereOsVersion($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   wherePassword($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   wherePhone($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereServices($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Driver   whereWallet($value)
 *
 * @mixin \Eloquent
 */
class Driver extends Authenticatable
{
    use AuthenticatableTrait;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Translatable;
    use HasWallet;
    use HasTransaction;
    use HasNotes ;

    protected $guarded = [];
    protected $casts   = [
        'services'       => 'array',
        'location'       => 'array',
        'latitude'       => 'string',
        'longitude'      => 'string',
        'has_logisti_id' => 'boolean',
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
        'deleted_at'     => 'datetime',
    ];

    protected $attributes = [
        'status' => 'under_revision',
    ];

    protected $fillable = [
        'status',
        'phone',
        'full_name',
        'city_id',
        'email',
        'password',
        'ID',
        'car_front',
        'car_back',
        'ID_photo',
        'license',
        'car_register',
        'device_id',
        'notification_id',
        'device_type',
        'os_version',
        'services',
        'location',
        'latitude',
        'longitude',
        'bank_IBAN',
        'bank_name',
        'wallet',
        'operation_manger_id',
        'hiring_type',
        'ID_number',
        'gender',
        'notes_history',
        'block',
        'account_status',
        'has_logisti_id',
        'identityTypeId',
        'idNumber',
        'regionId',
        'cityId',
        'carTypeId',
        'carNumber',
        'vehicleSequenceNumber',
        'mobile',
        'dateOfBirth',
        'registrationDate',
    ];

    protected $hidden = ['remember_token', 'password'];

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

    public function setCarFrontAttribute($value): void
    {
        $this->attributes['car_front'] = storeImage($value, 'driver', 'car');
    }

    public function setCarBackAttribute($value): void
    {
        $this->attributes['car_back'] = storeImage($value, 'driver', 'car');
    }

    public function setIDPhotoAttribute($value): void
    {
        $this->attributes['ID_photo'] = storeImage($value, 'driver', 'ID');
    }

    public function setCarRegisterAttribute($value): void
    {
        $this->attributes['car_register'] = storeImage($value, 'driver', 'Car');
    }

    public function setLicenseAttribute($value): void
    {
        $this->attributes['license'] = storeImage($value, 'driver', 'license');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function activeOrder(): HasMany
    {
        return $this->hasMany(Order::class)
            ->whereIn('status', OrderStatus::onlyActive());
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(DriverTransaction::class)
            ->orderByDesc('created_at');
    }

    public function payouts(): HasMany
    {
        return $this->hasMany(DriverPayout::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(DriverAssignment::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(self::class, 'related_id')->where('related_type', self::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function operational(): BelongsTo
    {
        return $this->belongsTo(Operational::class, 'operation_manger_id');
    }

    public function complains(): HasMany
    {
        return $this->hasMany(Complaint::class, 'related_id', '_id')->where('related_type', self::class);
    }

    public function cashoutMethods(): HasMany
    {
        return $this->hasMany(CashoutMethods::class, 'related_id', '_id')->where('related_type', self::class);
    }

    public function acceptsService(string $service): bool
    {
        return getDriverServices($this, true)[$service] ?? true;
    }

    public function updateService($package_order = null, $delivery_order = null, $feasts = null, $reservations = null): mixed
    {
        $services = $this->services;

        if ($package_order !== null) {
            $services['package_order'] = $package_order === true || $package_order === 1;
        }

        if ($delivery_order !== null) {
            $services['delivery_order'] = $delivery_order === true || $delivery_order === 1;
        }

        if ($feasts !== null) {
            $services['feasts'] = $feasts === true || $feasts === 1;
        }

        return   $this->update(['services' => $services]);
    }
}
