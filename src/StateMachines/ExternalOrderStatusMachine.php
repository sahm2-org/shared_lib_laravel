<?php

namespace Saham\SharedLibs\StateMachines;

use Saham\SharedLibs\Models\Enums\ExternalOrderStatus;

class ExternalOrderStatusMachine extends BaseStateMachine
{
    public function recordHistory(): bool
    {
        return true;
    }

    /**
     * set default status of newly created models.
     */
    public function defaultState(): ?string
    {
        return ExternalOrderStatus::PendingApproval->value;
    }

    /**
     * define list of available transitions.
     *
     * @return array<string,array<string,callable>>
     */
    public function transitions(): array
    {
        return [

            ExternalOrderStatus::PendingApproval->value => [
                ExternalOrderStatus::ApprovedNotPaid->value => fn($model, $who) => $this->inGroup(['administrators', 'partners', 'drivers'], $who),
                ExternalOrderStatus::Rejected->value => fn($model, $who) => $this->inGroup(['administrators', 'partners', 'drivers'], $who),
            ],

            ExternalOrderStatus::ApprovedNotPaid->value => [
                ExternalOrderStatus::PendingOnlinePayment->value => fn($model, $who) => $this->inGroup(['users'], $who),
                ExternalOrderStatus::PendingBankTransfer->value => fn($model, $who) => $this->inGroup(['users'], $who),
                ExternalOrderStatus::Rejected->value => fn($model, $who) => $this->inGroup(['administrators', 'users'], $who),
            ],

            ExternalOrderStatus::PendingOnlinePayment->value => [
                ExternalOrderStatus::PaidTheConfirmationFee->value => fn($model, $who) => true, // Payment gateway handles this
                ExternalOrderStatus::Paid->value => fn($model, $who) => true, // Payment gateway handles this
                ExternalOrderStatus::Rejected->value => fn($model, $who) => $this->inGroup(['administrators'], $who),
            ],

            ExternalOrderStatus::PendingBankTransfer->value => [
                ExternalOrderStatus::PaidTheConfirmationFee->value => fn($model, $who) => $this->inGroup(['administrators'], $who),
                ExternalOrderStatus::Paid->value => fn($model, $who) => $this->inGroup(['administrators'], $who),
                ExternalOrderStatus::Rejected->value => fn($model, $who) => $this->inGroup(['administrators'], $who),
            ],

            ExternalOrderStatus::PaidTheConfirmationFee->value => [
                ExternalOrderStatus::Processing->value => fn($model, $who) => $this->inGroup(['administrators', 'partners', 'drivers'], $who),
                ExternalOrderStatus::Shipped->value => fn($model, $who) => $this->inGroup(['administrators', 'partners', 'drivers'], $who),
            ],

            ExternalOrderStatus::Paid->value => [
                ExternalOrderStatus::Processing->value => fn($model, $who) => $this->inGroup(['administrators', 'partners', 'drivers'], $who),
                ExternalOrderStatus::Shipped->value => fn($model, $who) => $this->inGroup(['administrators', 'partners', 'drivers'], $who),
            ],

            ExternalOrderStatus::Processing->value => [
                ExternalOrderStatus::Shipped->value => fn($model, $who) => $this->inGroup(['administrators', 'partners', 'drivers'], $who),
            ],

            ExternalOrderStatus::Shipped->value => [
                ExternalOrderStatus::Completed->value => fn($model, $who) => $this->inGroup(['administrators', 'users'], $who),
            ],

            ExternalOrderStatus::Completed->value => [],

            ExternalOrderStatus::Rejected->value => [
                ExternalOrderStatus::PendingApproval->value => fn($model, $who) => $this->inGroup(['administrators'], $who)
            ],

        ];
    }
}
