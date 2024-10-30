<?php

namespace App\Observers;

use App\Models\Category_user;
use Illuminate\Support\Facades\DB;

class CategoryUserObserver
{
    /**
     * Handle the Category_user "created" event.
     */
    public function created(Category_user $category_user): void
    {
        
        DB::table('categories')
        ->where('id', $category_user->category_id)
        ->increment('users_count');
    }

    /**
     * Handle the Category_user "updated" event.
     */
    public function updated(Category_user $category_user): void
    {
        DB::table('categories')
        ->where('id', $category_user->category_id)
        ->increment('users_count');
    }

    /**
     * Handle the Category_user "deleted" event.
     */
    public function deleted(Category_user $category_user): void
    {
        
        DB::table('categories')
        ->where('id', $category_user->category_id)
        ->decrement('users_count');
    }

    /**
     * Handle the Category_user "restored" event.
     */
    public function restored(Category_user $category_user): void
    {
        //
    }

    /**
     * Handle the Category_user "force deleted" event.
     */
    public function forceDeleted(Category_user $category_user): void
    {
        //
    }
}
