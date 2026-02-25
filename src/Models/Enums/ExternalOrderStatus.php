<?php

namespace Saham\SharedLibs\Models\Enums;

enum ExternalOrderStatus: string
{
    case PendingApproval        = 'pending_approval';
    case ApprovedNotPaid        = 'approved_not_paid';
    case PendingOnlinePayment   = 'pending_online_payment';
    case PendingBankTransfer    = 'pending_bank_transfer';
    case PaidTheConfirmationFee = 'paid_the_confirmation_fee';
    case Paid                   = 'paid';
    case Processing             = 'processing';
    case Shipped                = 'shipped';
    case Completed              = 'completed';
    case Rejected               = 'rejected';

    /**
     * Get all statues statuses.
     *
     * @return array<string>
     */
    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
