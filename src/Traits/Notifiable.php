<?php

namespace Saham\SharedLibs\Traits;

use Illuminate\Notifications\RoutesNotifications;

trait Notifiable
{
    use HasDatabaseNotifications;
    use RoutesNotifications;
}
