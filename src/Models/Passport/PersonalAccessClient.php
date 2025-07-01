<?php

namespace Saham\SharedLibs\Models\Passport;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Passport\PersonalAccessClient as PassportPersonalAccessClient;
use Laravel\Passport\Passport;
use MongoDB\Laravel\Eloquent\Model as Eloquent;


/**
 * 
 *
 * @property mixed $id 2 occurrences
 * @property string|null $client_id 2 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 2 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 2 occurrences
 * @property-read \Saham\SharedLibs\Models\Passport\Client|null $client
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient whereClientId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PersonalAccessClient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PersonalAccessClient extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_personal_access_clients';
    protected $connection = 'authmongodb';

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the authentication codes for the client.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Passport::clientModel());
    }

    /**
     * Get the current connection name for the model.
     */
    public function getConnectionName(): ?string
    {
        return   $this->connection;
    }
}
