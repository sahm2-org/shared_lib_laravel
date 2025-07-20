<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
// use Illuminate\Contracts\Auth\Authenticatable;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use MongoDB\Laravel\Query\Builder;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\HasOne;
use Saham\SharedLibs\Traits\HasNotes;
use Saham\SharedLibs\Traits\HasOTPGrant;
use Saham\SharedLibs\Traits\HasPaymentTypes;
use Saham\SharedLibs\Traits\HasTransaction;
use Saham\SharedLibs\Traits\HasWalletForUser;
use Saham\SharedLibs\Traits\Notifiable;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed                                                                                                        $id                      1000 occurrences
 * @property string|null                                                                                                  $allowed_payment_methods 951 occurrences
 * @property string|null                                                                                                  $bank_iban               16 occurrences
 * @property string|null                                                                                                  $bank_name               26 occurrences
 * @property \Illuminate\Support\Carbon|null                                                                              $created_at              1000 occurrences
 * @property string|null                                                                                                  $cuisine_ids             999 occurrences
 * @property string|null                                                                                                  $device_id               943 occurrences
 * @property string|null                                                                                                  $device_type             943 occurrences
 * @property string|null                                                                                                  $email                   78 occurrences
 * @property string|null                                                                                                  $full_name               119 occurrences
 * @property string|null                                                                                                  $gender                  86 occurrences
 * @property string|null                                                                                                  $name                    1 occurrences
 * @property string|null                                                                                                  $notes_history           1 occurrences
 * @property string|null                                                                                                  $notification_id         943 occurrences
 * @property string|null                                                                                                  $os_version              943 occurrences
 * @property int|null                                                                                                     $otp                     1000 occurrences
 * @property string|null                                                                                                  $password                10 occurrences
 * @property string|null                                                                                                  $phone                   1000 occurrences
 * @property string|null                                                                                                  $referral_code           1000 occurrences
 * @property \Illuminate\Support\Carbon|null                                                                              $updated_at              1000 occurrences
 * @property \Saham\SharedLibs\Models\Wallet|null                                                                         $wallet                  100 occurrences
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Address>                              $addresses
 * @property int|null                                                                                                     $addresses_count
 * @property mixed                                                                                                        $balance
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\CashoutMethods>                       $cashoutMethods
 * @property int|null                                                                                                     $cashout_methods_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Client>                      $clients
 * @property int|null                                                                                                     $clients_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Complaint>                            $complains
 * @property int|null                                                                                                     $complains_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Deliver>                              $delivers
 * @property int|null                                                                                                     $delivers_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Favorite>                             $favorites
 * @property int|null                                                                                                     $favorites_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Feast>                                $feasts
 * @property int|null                                                                                                     $feasts_count
 * @property mixed|null                                                                                                   $payment_types
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Message>                              $messages
 * @property int|null                                                                                                     $messages_count
 * @property \Illuminate\Notifications\DatabaseNotificationCollection<int, \Saham\SharedLibs\Models\DatabaseNotification> $notifications
 * @property int|null                                                                                                     $notifications_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Order>                                $orders
 * @property int|null                                                                                                     $orders_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Rating>                               $ratings
 * @property int|null                                                                                                     $ratings_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Token>                       $tokens
 * @property int|null                                                                                                     $tokens_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\UserTransaction>                      $transactions
 * @property int|null                                                                                                     $transactions_count
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereAllowedPaymentMethods($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereBankIban($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereBankName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereCuisineIds($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereDeviceId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereDeviceType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereEmail($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereFullName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereGender($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereNotesHistory($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereNotificationId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereOsVersion($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereOtp($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   wherePassword($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   wherePhone($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereReferralCode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|User   whereWallet($value)
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use AuthenticatableTrait;
    use HasOTPGrant;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Translatable;
    use HasWalletForUser;
    use HasTransaction;
    use HasPaymentTypes;
    use HasNotes;

    protected $connection = 'authmongodb';

    protected $guarded = [];
    protected $with    = ['addresses'];

    protected $hidden = ['remember_token', 'otp'];

    protected $attributes = [
        'cuisine_ids' => [],
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'cuisine_ids', 'phone', 'otp', 'device_id', 'device_type', 'os_version', 'notification_id', 'email', 'allowed_payment_methods',
        'full_name', 'bank_iban', 'bank_name',  'referral_code', 'services', 'notes_history', 'block', 'password', 'gender',
    ];

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
        return $this->phone;
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function delivers(): HasMany
    {
        return $this->hasMany(Deliver::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function feasts(): HasMany
    {
        return $this->hasMany(Feast::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function transactions(): Builder|HasMany
    {
        return $this->hasMany(UserTransaction::class)
            ->orderByDesc('created_at');
    }

    public function favorites(): EloquentBuilder|HasMany
    {
        return $this->hasMany(Favorite::class, 'user_id')->with('store');
    }

    public function generateToken(): string
    {
        return $this->createToken('saham Password Grant Client')->accessToken;
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

    public function complains(): HasMany
    {
        return $this->hasMany(Complaint::class, 'related_id', '_id')->where('related_type', self::class);
    }

    public function cashoutMethods(): HasMany
    {
        return $this->hasMany(CashoutMethods::class, 'related_id', '_id')->where('related_type', self::class);
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }
    /*
        public function setWalletAttribute($value): void
        {
            $this->load('wallet');
            $this->wallet->update(['wallet' => $value]);
        }
        public function getWalletAttribute($value): float
        {
            $this->load('wallet');
            return    $this->wallet->wallet ?? 0;
        }  */

    public function acceptsService(string $service): bool
    {
        return getUserServices($this, true)[$service] ?? true;
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

        if ($reservations !== null) {
            $services['reservations'] = $reservations === true || $reservations === 1;
        }

        return   $this->update(['services' => $services]);
    }
}
