<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // Send email notification to user
        // $user->notify(new WelcomeNotification());
        $user->categories()->get()->each(function ($category) {
            DB::table('categories')
                ->where('id', $category->id)
                ->increment('users_count');
        });

        DB::table('contracts')
            ->where('id',$user->contract_id)
            ->increment('partner_count');

    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {

    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $user->categories()->get()->each(function ($category) {
            DB::table('categories')
                ->where('id', $category->id)
                ->decrement('users_count');
        });

        DB::table('contracts')
            ->where('id',$user->contract_id)
            ->decrement('partner_count');
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
    
}
