<?php

namespace IGestao\Application\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //diretivas para datas no blades
        Blade::directive('datetime', function ($expression, $format) {
            return "<?php echo ($expression)->format($format); ?>";
        });

        //diretivas para precos no blades
        Blade::directive('priceFormat', function ($expression) {
            return "<?php echo e(number_format({$expression}, 2, ',', '.')); ?>";
        });

        //diretivas para precos no blades
        Blade::directive('priceFormatWithoutDecimal', function ($expression) {
            return "<?php echo e(number_format({$expression}, 0, ',', '.')); ?>";
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(BroadcastServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }
}
