<?php

namespace Saham\SharedLibs\Models\Passport;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Laravel\Passport\Database\Factories\ClientFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

class Client extends BaseModel
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_clients';

    protected $connection = 'authmongodb';

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'grant_types' => 'array',
        'scopes' => 'array',
        'personal_access_client' => 'bool',
        'password_client' => 'bool',
        'revoked' => 'bool',
    ];

    /**
     * The temporary plain-text client secret.
     *
     * This is only available during the request that created the client.
     *
     * @var string|null
     */
    public $plainSecret;

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Passport::clientUuids()) {
                $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: (string) Str::orderedUuid();
            }
        });
    }

    /**
     * Get the user that the client belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        $provider = $this->provider ?: config('auth.guards.api.provider');

        return $this->belongsTo(
            config("auth.providers.{$provider}.model")
        );
    }

    /**
     * Get all of the authentication codes for the client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authCodes()
    {
        return $this->hasMany(Passport::authCodeModel(), 'client_id');
    }

    /**
     * Get all of the tokens that belong to the client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany(Passport::tokenModel(), 'client_id');
    }

    /**
     * The temporary non-hashed client secret.
     *
     * This is only available once during the request that created the client.
     *
     * @return string|null
     */
    public function getPlainSecretAttribute()
    {
        return $this->plainSecret;
    }

    /**
     * Set the value of the secret attribute.
     *
     * @param  string|null  $value
     * @return void
     */
    public function setSecretAttribute($value)
    {
        $this->plainSecret = $value;

        if (is_null($value) || ! Passport::$hashesClientSecrets) {
            $this->attributes['secret'] = $value;

            return;
        }

        $this->attributes['secret'] = password_hash($value, PASSWORD_BCRYPT);
    }

    /**
     * Determine if the client is a "first party" client.
     *
     * @return bool
     */
    public function firstParty()
    {
        return $this->personal_access_client || $this->password_client;
    }

    /**
     * Determine if the client should skip the authorization prompt.
     *
     * @return bool
     */
    public function skipsAuthorization()
    {
        return false;
    }

    /**
     * Determine if the client has the given grant type.
     *
     * @param  string  $grantType
     * @return bool
     */
    public function hasGrantType($grantType)
    {
        return true;
        if (! isset($this->attributes['grant_types']) || ! is_array($this->grant_types)) {
            return true;
        }

        return in_array($grantType, $this->grant_types);
    }

    /**
     * Determine whether the client has the given scope.
     *
     * @param  string  $scope
     * @return bool
     */
    public function hasScope($scope)
    {
        if (! isset($this->attributes['scopes']) || ! is_array($this->scopes)) {
            return true;
        }

        $scopes = Passport::$withInheritedScopes
            ? $this->resolveInheritedScopes($scope)
            : [$scope];

        foreach ($scopes as $scope) {
            if (in_array($scope, $this->scopes)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if the client is a confidential client.
     *
     * @return bool
     */
    public function confidential()
    {
        return ! empty($this->secret);
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return Passport::clientUuids() ? 'string' : $this->keyType;
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return Passport::clientUuids() ? false : $this->incrementing;
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

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ClientFactory::new();
    }
}

//
// use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Support\Str;
// use Laravel\Passport\Passport;
// use Laravel\Passport\Saham\SharedLibs\Database\Factories\ClientFactory;
// use MongoDB\Laravel\Eloquent\Model;
//
// class Client extends Model
// {
//     use HasFactory;
//
//     /**
//      * The database table used by the model.
//      *
//      * @var string
//      */
//     protected $table = 'oauth_clients';
//
//     protected $connection = 'authmongodb';
//
//     /**
//      * The guarded attributes on the model.
//      *
//      * @var array
//      */
//     protected $guarded = [];
//
//     /**
//      * The attributes excluded from the model's JSON form.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'secret',
//     ];
//
//     /**
//      * The attributes that should be cast to native types.
//      *
//      * @var array
//      */
//     protected $casts = [
//         'grant_types' => 'array',
//         'personal_access_client' => 'bool',
//         'password_client' => 'bool',
//         'revoked' => 'bool',
//     ];
//
//     /**
//      * The temporary plain-text client secret.
//      *
//      * @var string|null
//      */
//     protected $plainSecret;
//
//     /**
//      * Bootstrap the model and its traits.
//      */
//     public static function boot(): void
//     {
//         parent::boot();
//
//         static::creating(static function ($model): void {
//             if (config('passport.client_uuids')) {
//                 $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: (string) Str::orderedUuid();
//             }
//         });
//     }
//
//     /**
//      * Get the user that the client belongs to.
//      */
//     public function user(): BelongsTo
//     {
//         $provider = $this->provider ?: config('auth.guards.api.provider');
//
//         return $this->belongsTo(
//             config("auth.providers.{$provider}.model")
//         );
//     }
//
//     /**
//      * Get all of the authentication codes for the client.
//      */
//     public function authCodes(): HasMany
//     {
//         return $this->hasMany(Passport::authCodeModel(), 'client_id');
//     }
//
//     /**
//      * Get all of the tokens that belong to the client.
//      */
//     public function tokens(): HasMany
//     {
//         return $this->hasMany(Passport::tokenModel(), 'client_id');
//     }
//
//     /**
//      * The temporary non-hashed client secret.
//      *
//      * This is only available once during the request that created the client.
//      */
//     public function getPlainSecretAttribute(): ?string
//     {
//         return $this->plainSecret;
//     }
//
//     /**
//      * Set the value of the secret attribute.
//      *
//      * @param  string|null  $value
//      */
//     public function setSecretAttribute($value): void
//     {
//         $this->plainSecret = $value;
//
//         if (is_null($value) || ! Passport::$hashesClientSecrets) {
//             $this->attributes['secret'] = $value;
//
//             return;
//         }
//
//         $this->attributes['secret'] = password_hash($value, PASSWORD_BCRYPT);
//     }
//
//     /**
//      * Determine if the client is a "first party" client.
//      */
//     public function firstParty(): bool
//     {
//         return $this->personal_access_client || $this->password_client;
//     }
//
//     /**
//      * Determine if the client should skip the authorization prompt.
//      */
//     public function skipsAuthorization(): bool
//     {
//         return false;
//     }
//
//     /**
//      * Determine if the client is a confidential client.
//      */
//     public function confidential(): bool
//     {
//         return $this->secret !== '' && $this->secret !== null;
//     }
//
//     /**
//      * Get the auto-incrementing key type.
//      */
//     public function getKeyType(): string
//     {
//         return Passport::clientUuids() ? 'string' : $this->keyType;
//     }
//
//     /**
//      * Get the value indicating whether the IDs are incrementing.
//      */
//     public function getIncrementing(): bool
//     {
//         return Passport::clientUuids() ? false : $this->incrementing;
//     }
//
//     /**
//      * Get the current connection name for the model.
//      */
//     public function getConnectionName(): ?string
//     {
//         return $this->connection;
//     }
//
//     /**
//      * Create a new factory instance for the model.
//      */
//     public static function newFactory(): Factory
//     {
//         return ClientFactory::new();
//     }
// }
