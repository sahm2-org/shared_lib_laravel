<?php

namespace Saham\SharedLibs\Models\Passport;

use Laravel\Passport\Passport;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * @property-read \Saham\SharedLibs\Models\Passport\Client|null $client
 * @property-read mixed $id
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode raw($value = null)
 * @mixin \Eloquent
 */
class AuthCode extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_auth_codes';

    protected $connection = 'authmongodb';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'revoked' => 'bool',
        'expires_at' => 'datetime',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Get the client that owns the authentication code.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Passport::clientModel());
    }

    /**
     * Get the current connection name for the model.
     *
     * @return string|null
     */
    public function getConnectionName()
    {
        return $this->connection ?? config('passport.connection');
    }
}
//
// /**
//  *
//  *
//  * @property-read \Saham\SharedLibs\Models\Passport\Client|null $client
//  * @property-read mixed $id
//  * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
//  * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode aggregate($function = null, $columns = [])
//  * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode getConnection()
//  * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode insert(array $values)
//  * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode insertGetId(array $values, $sequence = null)
//  * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode newModelQuery()
//  * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode newQuery()
//  * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode query()
//  * @method static \MongoDB\Laravel\Eloquent\Builder<static>|AuthCode raw($value = null)
//  * @mixin \Eloquent
//  */
// class AuthCode extends Model
// {
//     /**
//      * The database table used by the model.
//      *
//      * @var string
//      */
//     protected $table = 'oauth_auth_codes';
//     protected $connection = 'authmongodb';
//
//     /**
//      * Indicates if the IDs are auto-incrementing.
//      *
//      * @var bool
//      */
//     public $incrementing = false;
//
//     /**
//      * The guarded attributes on the model.
//      *
//      * @var array
//      */
//     protected $guarded = [];
//
//     /**
//      * The attributes that should be cast to native types.
//      *
//      * @var array
//      */
//     protected $casts = [
//         'revoked' => 'bool',
//         'expires_at' => 'datetime',
//     ];
//
//     /**
//      * The attributes that should be mutated to dates.
//      *
//      * @var array
//      */
//     protected $dates = [
//         'expires_at',
//     ];
//
//     /**
//      * Indicates if the model should be timestamped.
//      *
//      * @var bool
//      */
//     public $timestamps = false;
//
//     /**
//      * The "type" of the primary key ID.
//      *
//      * @var string
//      */
//     protected $keyType = 'string';
//
//     /**
//      * Get the client that owns the authentication code.
//      */
//     public function client(): BelongsTo
//     {
//         return $this->belongsTo(Passport::clientModel());
//     }
//
//     /**
//      * Get the current connection name for the model.
//      */
//     public function getConnectionName(): ?string
//     {
//         return   $this->connection;
//     }
// }
