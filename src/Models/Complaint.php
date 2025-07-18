<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $comments 335 occurrences
 * @property string|null $complaint_type_id 1000 occurrences
 * @property int|null $converted 1 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $description 1000 occurrences
 * @property string|null $files 269 occurrences
 * @property string|null $order_id 1000 occurrences
 * @property string|null $related_id 1000 occurrences
 * @property string|null $related_type 1000 occurrences
 * @property string|null $status 1000 occurrences
 * @property string|null $store_id 995 occurrences
 * @property int|null $ticket_id 1 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read \Saham\SharedLibs\Models\Order|null $order
 * @property-read \Saham\SharedLibs\Models\Driver|null $related
 * @property-write mixed $file_complaint
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @property-read \Saham\SharedLibs\Models\ComplaintType|null $typeComplaint
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereComments($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereComplaintTypeId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereConverted($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereDescription($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereFiles($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereOrderId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereRelatedId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereRelatedType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereTicketId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Complaint whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Complaint extends BaseModel
{
    use HasFactory;
    use Translatable;

    protected array $translatable = ['name'];
    protected $table              = 'complaints';
    protected $fillable           = ['order_id', 'related_id', 'related_type', 'store_id', 'complaint_type_id', 'comments', 'description', 'status', 'files'];

    public function setFileComplaintAttribute($value, $type = 'driver'): void
    {
        $this->attributes['file_complaint'] = storeImage($value, $type, 'complaint');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function related(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'related_id');
    }

    public function typeComplaint(): BelongsTo
    {
        return $this->belongsTo(ComplaintType::class, 'complaint_type_id');
    }
}
