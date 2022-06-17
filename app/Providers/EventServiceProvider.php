<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Component;
use App\Models\Producer;
use App\Models\Product;
use App\Models\Retailer;
use App\Models\RetailerPricing;
use App\Models\Shop;
use App\Models\Voivodeship;
use App\Observers\CategoryObserver;
use App\Observers\CityObserver;
use App\Observers\ComponentObserver;
use App\Observers\ProducerObserver;
use App\Observers\ProductObserver;
use App\Observers\RetailerObserver;
use App\Observers\RetailerPricingObserver;
use App\Observers\ShopObserver;
use App\Observers\VoivodeshipObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [
        Category::class => [CategoryObserver::class],
        Component::class => [ComponentObserver::class],
        Voivodeship::class => [VoivodeshipObserver::class],
        City::class => [CityObserver::class],
        Shop::class => [ShopObserver::class],
        Retailer::class => [RetailerObserver::class],
        Product::class => [ProductObserver::class],
        Producer::class => [ProducerObserver::class],
        RetailerPricing::class => [RetailerPricingObserver::class],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
