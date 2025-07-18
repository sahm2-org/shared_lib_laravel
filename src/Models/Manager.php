<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Auth\User as Authenticatable;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $business_hours 924 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $deleted_at 51 occurrences
 * @property string|null $device_id 419 occurrences
 * @property string|null $device_type 419 occurrences
 * @property string|null $email 1000 occurrences
 * @property string|null $fcm_token 358 occurrences
 * @property string|null $full_name 1000 occurrences
 * @property string|null $notification_id 419 occurrences
 * @property string|null $os_version 419 occurrences
 * @property string|null $password 1000 occurrences
 * @property string|null $phone 1000 occurrences
 * @property string|null $store_id 999 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Feast> $feasts
 * @property-read int|null $feasts_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Saham\SharedLibs\Models\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\ManagerFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereBusinessHours($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereDeletedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereDeviceId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereDeviceType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereEmail($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereFcmToken($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereFullName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereNotificationId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereOsVersion($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager wherePassword($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager wherePhone($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Manager whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Manager extends Authenticatable
{
    use AuthenticatableTrait;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $guarded = [];

    protected $hidden = ['remember_token', 'password'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'full_name', 'email', 'phone', 'block', 'password' ,  'notification_id',
        'device_id',
        'device_type',
        'os_version',
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

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'store_id', 'store_id');
    }

    public function feasts(): HasMany
    {
        return $this->hasMany(Feast::class, 'store_id', 'store_id');
    }
}
