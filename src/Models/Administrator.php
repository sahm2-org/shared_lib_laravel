<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
// use Saham\SharedLibs\Traits\HasRoles;
use Saham\SharedLibs\Traits\HasRoles;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use MongoDB\Laravel\Auth\User as Authenticatable;

/**
 * 
 *
 * @property mixed $id 10 occurrences
 * @property string|null $avatar 2 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 8 occurrences
 * @property string|null $device_id 10 occurrences
 * @property string|null $device_type 10 occurrences
 * @property string|null $email 10 occurrences
 * @property string|null $fcm_token 8 occurrences
 * @property int|null $freeze 1 occurrences
 * @property string|null $full_name 10 occurrences
 * @property string|null $notification_id 10 occurrences
 * @property string|null $os_version 10 occurrences
 * @property string|null $password 10 occurrences
 * @property string|null $phone 10 occurrences
 * @property string|null $role 10 occurrences
 * @property string|null $role_ids 10 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 10 occurrences
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read Collection<string>|null $permissions
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Saham\SharedLibs\Models\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator permission($permissions)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator role($roles)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereAvatar($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereDeviceId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereDeviceType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereEmail($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereFcmToken($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereFreeze($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereFullName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereNotificationId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereOsVersion($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator wherePassword($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator wherePhone($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereRole($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereRoleIds($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Administrator whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Administrator extends Authenticatable implements AuthorizableContract
{
    use AuthenticatableTrait;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Authorizable;
    use HasRoles;
    use InteractsWithMedia;

    protected $fillable = [
        'full_name', 'email', 'phone', 'avatar', 'avatarURL',  'password', 'freeze', 'role', 'device_id', 'device_type', 'notification_id', 'os_version', 'role_ids',
    ];
    protected $primaryKey = '_id';
    protected $connection = 'mongodb';
    protected $guarded    = [];
    protected $table      = 'administrators';
    protected $attribute  = ['avatar' => 'assets/images/users/saham.jpg'];
    protected $hidden     = ['password'];

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [];

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array<string>
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
