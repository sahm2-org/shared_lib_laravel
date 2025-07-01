<?php

namespace Saham\SharedLibs\Models\Passport;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Passport\Passport;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $access_token_id 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $expires_at 1000 occurrences
 * @property bool|null $revoked 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Passport\Token|null $accessToken
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken whereAccessTokenId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken whereExpiresAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|RefreshToken whereRevoked($value)
 *
 * @mixin \Eloquent
 */
class RefreshToken extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_refresh_tokens';

    protected $connection = 'authmongodb';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'expires_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the access token that the refresh token belongs to.
     */
    public function accessToken(): BelongsTo
    {
        return $this->belongsTo(Passport::tokenModel());
    }

    /**
     * Revoke the token instance.
     */
    public function revoke(): bool
    {
        return $this->forceFill(['revoked' => true])->save();
    }

    /**
     * Determine if the token is a transient JWT token.
     */
    public function transient(): bool
    {
        return false;
    }

    /**
     * Get the current connection name for the model.
     */
    public function getConnectionName(): ?string
    {
        return $this->connection;
    }
}
