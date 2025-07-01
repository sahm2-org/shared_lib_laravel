<?php

namespace Saham\SharedLibs\Models;

use MongoDB\Laravel\Eloquent\Model;

/**
 * 
 *
 * @property mixed $id 1000 occurrences
 * @property string|null $causer 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $date 1000 occurrences
 * @property string|null $event 1000 occurrences
 * @property string|null $guard_name 1000 occurrences
 * @property string|null $old_properties 1000 occurrences
 * @property string|null $related_id 1000 occurrences
 * @property string|null $related_type 1000 occurrences
 * @property string|null $subject 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereCauser($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereDate($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereEvent($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereGuardName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereOldProperties($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereRelatedId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereRelatedType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereSubject($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Activity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Activity extends Model
{
    //    protected $connection = 'mongodb_log';
    protected $table      = 'activity_log';
    protected $fillable   = ['event', 'related_id', 'related_type', 'guard_name', 'subject', 'causer', 'properties', 'old_properties', 'date'];
}
