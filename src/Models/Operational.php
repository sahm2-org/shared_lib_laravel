<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\Traits\HasNotes;
use Saham\SharedLibs\Traits\HasTransaction;
use Saham\SharedLibs\Traits\HasWallet;
use Saham\SharedLibs\Traits\Translatable;
use MongoDB\Laravel\Auth\User as Authenticatable;

/**
 * 
 *
 * @property mixed $id 7 occurrences
 * @property bool|null $auto_assign 4 occurrences
 * @property string|null $avatar 7 occurrences
 * @property string|null $avatarURL 6 occurrences
 * @property string|null $bank_IBAN 4 occurrences
 * @property string|null $bank_name 4 occurrences
 * @property int|null $block 2 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 7 occurrences
 * @property string|null $email 7 occurrences
 * @property string|null $full_name 7 occurrences
 * @property string|null $password 7 occurrences
 * @property string|null $phone 7 occurrences
 * @property string|null $rang_kilo 4 occurrences
 * @property string|null $status 4 occurrences
 * @property string|null $system_driver_commission_amount 3 occurrences
 * @property string|null $system_driver_commission_percentage 3 occurrences
 * @property string|null $time_to_assign 4 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 7 occurrences
 * @property-read mixed $balance
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Driver> $drivers
 * @property-read int|null $drivers_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Saham\SharedLibs\Models\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\OperationalPayout> $payouts
 * @property-read int|null $payouts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\OperationalTransaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereAutoAssign($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereAvatar($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereAvatarURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereBankIBAN($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereBankName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereBlock($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereEmail($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereFullName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational wherePassword($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational wherePhone($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereRangKilo($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereSystemDriverCommissionAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereSystemDriverCommissionPercentage($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereTimeToAssign($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Operational whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Operational extends Authenticatable
{
    use AuthenticatableTrait;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasTransaction;
    use Translatable;
    use HasWallet;
    use HasNotes ;

    protected $attributes = [
        'status' => 'under_revision',
    ];

    protected $guarded = [];

    protected $hidden = ['remember_token', 'password'];

    protected $fillable = [
          'full_name', 'email'
        , 'phone', 'avatar','avatarURL', 'password', 'phone_code'
        , 'bank_name' , 'bank_IBAN' , 'system_driver_commission_percentage'
        , 'system_driver_commission_amount'
        ,  'block'
        ,  'wallet'
        , 'status'
        ,'rang_kilo'
        ,'time_to_assign'
        , 'auto_assign'
        , 'notification_id'
        , 'device_id'
        , 'device_type'
        , 'os_version'
        , 'notes_history',
    ];

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function findForPassport($username): ?self
    {
        return $this->where('email', $username)->first();
    }

    public function routeNotificationForFcm($notifiable): string
    {
        return $this->notification_id;
    }

    public function payouts(): HasMany
    {
        return $this->hasMany(OperationalPayout::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(OperationalTransaction::class)
            ->orderByDesc('created_at');
    }

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class, 'operation_manger_id');
    }
}
