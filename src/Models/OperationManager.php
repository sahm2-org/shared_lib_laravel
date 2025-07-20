<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Saham\SharedLibs\Traits\Notifiable;

/**
 * @property mixed                                                                                                        $id                  1 occurrences
 * @property string|null                                                                                                  $color_code          1 occurrences
 * @property \Illuminate\Support\Carbon|null                                                                              $created_at          1 occurrences
 * @property string|null                                                                                                  $email               1 occurrences
 * @property string|null                                                                                                  $full_name           1 occurrences
 * @property string|null                                                                                                  $password            1 occurrences
 * @property string|null                                                                                                  $phone               1 occurrences
 * @property string|null                                                                                                  $type                1 occurrences
 * @property \Illuminate\Support\Carbon|null                                                                              $updated_at          1 occurrences
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Client>                      $clients
 * @property int|null                                                                                                     $clients_count
 * @property \Illuminate\Notifications\DatabaseNotificationCollection<int, \Saham\SharedLibs\Models\DatabaseNotification> $notifications
 * @property int|null                                                                                                     $notifications_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Passport\Token>                       $tokens
 * @property int|null                                                                                                     $tokens_count
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager whereColorCode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager whereEmail($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager whereFullName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager wherePassword($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager wherePhone($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationManager whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class OperationManager extends Authenticatable
{
    use AuthenticatableTrait;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $guarded = [];
    protected $table   = 'operation_manager';

    protected $hidden = ['remember_token', 'password'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted_at'        => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] =    Hash::make($value); // bcrypt($value);
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
}
