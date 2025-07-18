<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * @property-read mixed $id
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|NotificationSchedule addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|NotificationSchedule aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|NotificationSchedule getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|NotificationSchedule insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|NotificationSchedule insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|NotificationSchedule newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|NotificationSchedule newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|NotificationSchedule query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|NotificationSchedule raw($value = null)
 * @mixin \Eloquent
 */
class NotificationSchedule extends BaseModel
{
    private $fields = [
        'type_push' => 'boolean',
        'type_email' => 'boolean',
        'type_sms' => 'boolean',
        'type_whatsapp' => 'boolean',
        'users_last_order_between_from' => 'date',
        'users_last_order_between_to' => 'date',
        'users_no_orders' => 'boolean',
        'all_users' => 'boolean',
        'all_partners' => 'boolean',
        'all_drivers' => 'boolean',
        'body' => 'string',
        'title' => 'string',
        'is_recurring' => 'boolean',
        'schedule_at' => 'string',
        'sent_at' => 'string',
    ];

    protected $dates = ['created_at', 'updated_at', 'schedule_at', 'sent_at'];
    protected $casts = [
      'created_at' => 'datetime',
      'updated_at' => 'datetime',
      'schedule_at' => 'datetime',
      'sent_at' => 'datetime',
    ];
}
