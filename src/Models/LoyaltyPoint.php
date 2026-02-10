<?php

namespace Saham\SharedLibs\Models;

use MongoDB\Laravel\Eloquent\Model;
use Carbon\Carbon;

/**
 * LoyaltyPoint Model
 * Tracks points earned and redeemed by users per store
 * 
 * @property string $user_id
 * @property string $store_id
 * @property string $order_id
 * @property int $points
 * @property int $redeemed_points
 * @property \Carbon\Carbon $expires_at
 */
class LoyaltyPoint extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'loyalty_points';

    protected $fillable = [
        'user_id',
        'store_id',
        'order_id',
        'points',          // Original points earned
        'redeemed_points', // Points that were already used for coupons
        'expires_at',
    ];

    protected $casts = [
        'user_id' => 'string',
        'store_id' => 'string',
        'order_id' => 'string',
        'points' => 'integer',
        'redeemed_points' => 'integer',
        'expires_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $attributes = [
        'redeemed_points' => 0,
    ];

    /**
     * Accessor for remaining points in a single record
     */
    public function getRemainingPointsAttribute(): int
    {
        return (int) ($this->points - ($this->redeemed_points ?? 0));
    }

    /**
     * Helper to get user's available points for a store
     */
    public static function getUserStorePoints(string $userId, string $storeId): int
    {
        return (int) static::where('user_id', $userId)
            ->where('store_id', $storeId)
            ->valid()
            ->get()
            ->sum('remaining_points');
    }

    /**
     * Scope for valid (non-expired and has remaining points)
     */
    public function scopeValid($query)
    {
        return $query->where('expires_at', '>', Carbon::now())
            ->whereRaw([
                '$expr' => [
                    '$gt' => [
                        '$points',
                        ['$ifNull' => ['$redeemed_points', 0]]
                    ]
                ]
            ]);
    }

    /**
     * Scope for expired points
     */
    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<=', Carbon::now());
    }

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
