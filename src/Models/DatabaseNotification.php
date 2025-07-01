<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * 
 *
 * @property mixed $id 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property array<array-key, mixed>|null $data 1000 occurrences
 * @property string|null $notifiable_id 1000 occurrences
 * @property string|null $notifiable_type 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $read_at 1000 occurrences
 * @property string|null $type 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $notifiable
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification aggregate($function = null, $columns = [])
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification read()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification unread()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification whereData($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification whereNotifiableId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification whereNotifiableType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification whereReadAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DatabaseNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DatabaseNotification extends BaseModel
{
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
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notifications';

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
        'data'    => 'array',
        'read_at' => 'datetime',
    ];

    /**
     * Get the notifiable entity that the notification belongs to.
     */
    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Mark the notification as read.
     */
    public function markAsRead(): void
    {
        if (is_null($this->read_at)) {
            $this->forceFill(['read_at' => $this->freshTimestamp()])->save();
        }
    }

    /**
     * Mark the notification as unread.
     */
    public function markAsUnread(): void
    {
        if (!is_null($this->read_at)) {
            $this->forceFill(['read_at' => null])->save();
        }
    }

    /**
     * Determine if a notification has been read.
     */
    public function read(): bool
    {
        return $this->read_at !== null;
    }

    /**
     * Determine if a notification has not been read.
     */
    public function unread(): bool
    {
        return $this->read_at === null;
    }

    /**
     * Scope a query to only include read notifications.
     *
     * @param Builder $query
     */
    public function scopeRead(Builder $query): Builder
    {
        return $query->whereNotNull('read_at');
    }

    /**
     * Scope a query to only include unread notifications.
     *
     * @param Builder $query
     */
    public function scopeUnread(Builder $query): Builder
    {
        return $query->whereNull('read_at');
    }

    /**
     * Create a new database notification collection instance.
     *
     * @param array $models
     */
    public function newCollection(array $models = []): DatabaseNotificationCollection
    {
        return new DatabaseNotificationCollection($models);
    }
}
