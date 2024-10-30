<?php

namespace App\Observers;

use App\Models\Image360;
use Illuminate\Support\Facades\DB;

class Image360Observer
{
    /**
     * Handle the Image360 "created" event.
     */
    public function created(Image360 $image360): void
    {
        DB::table('Photo360s')
        ->where('id', $image360->photo360_id)
        ->increment('image360_count');
    }

    /**
     * Handle the Image360 "updated" event.
     */
    public function updated(Image360 $image360): void
    {
        //
    }

    /**
     * Handle the Image360 "deleted" event.
     */
    public function deleted(Image360 $image360): void
    {
        DB::table('Photo360s')
        ->where('id', $image360->photo360_id)
        ->decrement('image360_count');
    }

    /**
     * Handle the Image360 "restored" event.
     */
    public function restored(Image360 $image360): void
    {
        //
    }

    /**
     * Handle the Image360 "force deleted" event.
     */
    public function forceDeleted(Image360 $image360): void
    {
        //
    }
}
