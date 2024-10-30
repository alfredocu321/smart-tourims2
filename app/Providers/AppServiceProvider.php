<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Category_user;
use App\Models\Product;
use App\Models\User;
use App\Observers\Category_UserObserver;
use App\Observers\CategoryUserObserver;
use App\Observers\ProductObserver;
use App\Observers\UserObserver;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Cashier\Subscription;
use App\Models\Cashier\Transaction;
use Laravel\Paddle\Cashier;
use Laravel\Paddle\Subscription as PaddleSubscription;
use Laravel\Paddle\Transaction as PaddleTransaction;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use App\Http\Responses\LoginResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::useSubscriptionModel(PaddleSubscription::class);
        Cashier::useTransactionModel(PaddleTransaction::class);
        //
        User::observe(UserObserver::class);
        Product::observe(ProductObserver::class);
        Category_user::observe(CategoryUserObserver::class);
        $this->registerPolicies();

        Gate::policy(Product::class, ProductPolicy::class);

    }
}
