<?php

namespace Saham\SharedLibs\Models\Passport;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Passport\Passport;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $client_id 1000 occurrences
 * @property string|null $created_at 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $expires_at 1000 occurrences
 * @property bool|null $revoked 1000 occurrences
 * @property array<array-key, mixed>|null $scopes 1000 occurrences
 * @property string|null $updated_at 1000 occurrences
 * @property string|null $user_id 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Passport\Client|null $client
 * @property-read \Saham\SharedLibs\Models\User|null $user
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token whereClientId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token whereExpiresAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token whereRevoked($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token whereScopes($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Token whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Token extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_access_tokens';

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
        'scopes' => 'array',
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
     * Get the client that the token belongs to.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Passport::clientModel());
    }

    /**
     * Get the user that the token belongs to.
     */
    public function user(): BelongsTo
    {
        $provider = $this->client->provider ?: config('auth.guards.api.provider');

        $model = config('auth.providers.'.$provider.'.model');

        return $this->belongsTo($model, 'user_id', (new $model)->getAuthIdentifierName());
    }

    /**
     * Determine if the token has a given scope.
     *
     * @param  string  $scope
     */
    public function can($scope): bool
    {
        if (in_array('*', $this->scopes, true)) {
            return true;
        }

        $scopes = Passport::$withInheritedScopes
            ? $this->resolveInheritedScopes($scope)
            : [$scope];

        foreach ($scopes as $scope) {
            if (array_key_exists($scope, array_flip($this->scopes))) {
                return true;
            }
        }

        return false;
    }

    /**
     * Resolve all possible scopes.
     *
     * @param  string  $scope
     */
    protected function resolveInheritedScopes($scope): mixed
    {
        $parts = explode(':', $scope);

        $partsCount = count($parts);

        $scopes = [];

        for ($i = 1; $i <= $partsCount; $i++) {
            $scopes[] = implode(':', array_slice($parts, 0, $i));
        }

        return $scopes;
    }

    /**
     * Determine if the token is missing a given scope.
     *
     * @param  string  $scope
     */
    public function cant($scope): bool
    {
        return ! $this->can($scope);
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
