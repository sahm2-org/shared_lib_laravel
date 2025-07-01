<?php

namespace Saham\SharedLibs\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * Class StateHistory
 *
 * @package Ashraf\LaravelEloquentStateMachines\Models
 * @property string $field
 * @property string $from
 * @property string $to
 * @property array $custom_properties
 * @property int $responsible_id
 * @property string $responsible_type
 * @property mixed $responsible
 * @property Carbon $created_at
 * @property array $changed_attributes
 * @property mixed $id 1000 occurrences
 * @property string|null $model_id 1000 occurrences
 * @property string|null $model_type 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory forField($field)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory from($from)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory to($to)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory transitionedFrom($from)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory transitionedTo($to)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereChangedAttributes($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereCustomProperties($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereField($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereFrom($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereModelId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereModelType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereResponsibleId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereResponsibleType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereTo($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory withCustomProperty($key, $operator, $value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory withResponsible($responsible)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|StateHistory withTransition($from, $to)
 * @mixin \Eloquent
 */
class StateHistory extends BaseModel
{
    protected $guarded = [];

    protected $casts = [
        'custom_properties' => 'array',
        'changed_attributes' => 'array',
    ];

    public function getCustomProperty($key)
    {
        return data_get($this->custom_properties, $key, null);
    }

    public function responsible()
    {
        return $this->morphTo();
    }

    public function allCustomProperties()
    {
        return $this->custom_properties ?? [];
    }

    public function changedAttributesNames()
    {
        return collect($this->changed_attributes ?? [])->keys()->toArray();
    }

    public function changedAttributeOldValue($attribute)
    {
        return data_get($this->changed_attributes, "$attribute.old", null);
    }

    public function changedAttributeNewValue($attribute)
    {
        return data_get($this->changed_attributes, "$attribute.new", null);
    }

    public function scopeForField($query, $field)
    {
        $query->where('field', $field);
    }

    public function scopeFrom($query, $from)
    {
        if (is_array($from)) {
            $query->whereIn('from', $from);
        } else {
            $query->where('from', $from);
        }
    }

    public function scopeTransitionedFrom($query, $from)
    {
        $query->from($from);
    }

    public function scopeTo($query, $to)
    {
        if (is_array($to)) {
            $query->whereIn('to', $to);
        } else {
            $query->where('to', $to);
        }
    }

    public function scopeTransitionedTo($query, $to)
    {
        $query->to($to);
    }

    public function scopeWithTransition($query, $from, $to)
    {
        $query->from($from)->to($to);
    }

    public function scopeWithCustomProperty($query, $key, $operator, $value = null)
    {
        $query->where("custom_properties->{$key}", $operator, $value);
    }

    public function scopeWithResponsible($query, $responsible)
    {
        if ($responsible instanceof Model) {
            return $query
                ->where('responsible_id', $responsible->getKey())
                ->where('responsible_type', get_class($responsible));
        }

        return $query->where('responsible_id', $responsible);
    }
}
