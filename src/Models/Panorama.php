<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * @property int|null $__v 3 occurrences
 * @property mixed $id 3 occurrences
 * @property string|null $default 3 occurrences
 * @property string|null $scenes 3 occurrences
 * @property string|null $store_id 3 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama whereDefault($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama whereScenes($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Panorama whereV($value)
 * @mixin \Eloquent
 */
class Panorama extends BaseModel {}
