<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Traits\HasStateMachines;
use Saham\SharedLibs\StateMachines\ExternalOrderStatusMachine;

/**
 * ExternalOrder — Orders for importing from China
 *
 * ─── Status Cycle ──────────────────────────────────────────────────────
 *
 *  1. pending_approval       → the user created the order, waiting for the supplier's approval
 *  2. approved_not_paid      → the supplier approved and set the price, waiting for the user to pay
 *  3. pending_online_payment → the user chose online payment, waiting for webhook
 *  3. pending_bank_transfer  → the user chose bank transfer, waiting for receipt via chat
 *  4. paid                   → the confirmation fee was paid (1000 SAR)
 *  5. processing             → the supplier started processing the order
 *  6. shipped                → the order was shipped from China
 *  7. completed              → the order was received
 *  8. rejected               → the order was rejected by the supplier
 *
 * ─── the main fields ──────────────────────────────────────────────────
 *
 * @property string       $name              the order name
 * @property string       $code              the order code (Auto-generated EXT-XXXXXXXX)
 * @property string       $description       the order description and product links
 * @property array        $attachments       the order attachments (images/files paths)
 * @property string       $status            the order status
 * @property string|null  $user_id           the order owner (the user)
 * @property string|null  $supplier_id       the order executor (the supplier)
 * @property float|null   $price             the order price
 * @property float|null   $shipping_cost     the shipping cost
 * @property float|null   $total_cost        the total cost (set by the supplier)
 * @property string|null  $pending_order_id  the PendingOrder ID when online payment
 */
class ExternalOrder extends BaseModel
{
     use HasStateMachines;

     protected $collection = 'external_orders';

     /**
      * `status` State Machines
      * @var array
      */
     public $stateMachines = [
          'status' => ExternalOrderStatusMachine::class
     ];

     /**
      * ─── the statuses ───────────────────────────────────────────────
      */
     const STATUS_PENDING_APPROVAL       = 'pending_approval';
     const STATUS_APPROVED_NOT_PAID      = 'approved_not_paid';
     const STATUS_PENDING_ONLINE_PAYMENT = 'pending_online_payment';
     const STATUS_PENDING_BANK_TRANSFER  = 'pending_bank_transfer';
     const STATUS_PAID_THE_CONFIRMATION_FEE = 'paid_the_confirmation_fee';
     const STATUS_PAID                   = 'paid';
     const STATUS_PROCESSING             = 'processing';
     const STATUS_SHIPPED                = 'shipped';
     const STATUS_COMPLETED              = 'completed';
     const STATUS_REJECTED               = 'rejected';

     /**
      * ─── Fillable ─────────────────────────────────────────────────────
      */
     protected $fillable = [
          'name',
          'code',
          'description',
          'attachments',
          'status',
          'user_id',
          'supplier_id',
          'price',
          'shipping_cost',
          'tax_type',          // 'percentage' or 'amount'
          'tax_value',         // The numeric value of the tax
          'other_services_cost',
          'total_cost',
          'pending_order_id',  // Link to PendingOrder when online payment
          'paid_at',
     ];

     /**
      * ─── Casts ────────────────────────────────────────────────────────
      */
     protected $casts = [
          'attachments'  => 'array',
          'price'        => 'float',
          'shipping_cost' => 'float',
          'tax_value'    => 'float',
          'other_services_cost' => 'float',
          'total_cost'   => 'float',
          'paid_at'      => 'datetime',
          'created_at'   => 'datetime',
          'updated_at'   => 'datetime',
          'deleted_at'   => 'datetime',
     ];

     /**
      * ─── Boot: Generate code and default status ─────────────────────────
      */
     protected static function boot(): void
     {
          parent::boot();

          static::creating(function ($model) {
               if (empty($model->code)) {
                    // Example: EXT-6A3F8C2D1B9E
                    $model->code = 'EXT-' . strtoupper(substr(md5(uniqid('', true)), 0, 12));
               }
          });
     }

    // ─── Relationships ─────────────────────────────────────────────────

     /**
      * The user who created the order
      */
     public function user()
     {
          return $this->belongsTo(User::class, 'user_id');
     }

     /**
      * The supplier / partner who will execute the order
      */
     public function supplier()
     {
          return $this->belongsTo(Driver::class, 'supplier_id');
     }

    // ─── Helpers ───────────────────────────────────────────────────────

     /**
      * Is the order in a state that allows payment?
      */
     public function canBePaid(): bool
     {
          return $this->status === self::STATUS_APPROVED_NOT_PAID;
     }

     /**
      * Has the order been paid (online or bank transfer?)
      */
     public function isPaid(): bool
     {
          return in_array($this->status, [
               self::STATUS_PAID_THE_CONFIRMATION_FEE,
               self::STATUS_PAID,
               self::STATUS_PROCESSING,
               self::STATUS_SHIPPED,
               self::STATUS_COMPLETED,
          ], true);
     }
}
