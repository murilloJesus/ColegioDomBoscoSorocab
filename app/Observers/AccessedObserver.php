<?php

namespace App\Observers;

use App\Models\Accessed;
use Illuminate\Support\Facades\Date;
use Ramsey\Uuid\Uuid;

class AccessedObserver
{
    /**
     * Handle the Accessed "creating" event.
     *
     * @param  \App\Models\Accessed  $accessed
     * @return void
     */
    public function creating(Accessed $accessed)
    {
        $accessed->uuid = Uuid::uuid4();
    }

    /**
     * Handle the Accessed "updated" event.
     *
     * @param  \App\Models\Accessed  $accessed
     * @return void
     */
    public function updated(Accessed $accessed)
    {
        //
    }

    /**
     * Handle the Accessed "deleted" event.
     *
     * @param  \App\Models\Accessed  $accessed
     * @return void
     */
    public function deleted(Accessed $accessed)
    {
        //
    }

    /**
     * Handle the Accessed "restored" event.
     *
     * @param  \App\Models\Accessed  $accessed
     * @return void
     */
    public function restored(Accessed $accessed)
    {
        //
    }

    /**
     * Handle the Accessed "force deleted" event.
     *
     * @param  \App\Models\Accessed  $accessed
     * @return void
     */
    public function forceDeleted(Accessed $accessed)
    {
        //
    }
}
