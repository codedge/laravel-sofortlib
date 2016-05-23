<?php namespace Codedge\Sofortlib;

use Illuminate\Support\ServiceProvider;

class SofortlibServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/sofortlib.php' => config_path('sofortlib.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/config/sofortlib.php';
        $this->mergeConfigFrom($configPath, 'sofortlib');

        $this->app->call( [ $this, 'registerBillcode' ] );
        $this->app->call( [ $this, 'registerBillcodeDetails' ] );

        $this->app->call( [ $this, 'registerIdeal' ] );
        $this->app->call( [ $this, 'registerIdealBanks' ] );

        $this->app->call( [ $this, 'registerPaycode' ] );
        $this->app->call( [ $this, 'registerPaycodeDetails' ] );

        $this->app->call( [ $this, 'registerSofortueberweisung' ] );

        $this->app->call( [ $this, 'registerRefund' ] );

        $this->app->call( [ $this, 'registerTransactionData' ] );
    }

    /**
     * Register the Billcode instance.
     *
     * @return void
     */
    public function registerBillcode()
    {
        $this->app->singleton('billcode', function($app)
        {
            $configKey = config('sofortlib.billcode.config_key');
            $apiUrl = config('sofortlib.billcode.api_url');
            return new \Sofort\SofortLib\Billcode($configKey, $apiUrl);
        });
    }

    /**
     * Register the BillcodeDetails instance.
     *
     * @return void
     */
    public function registerBillcodeDetails()
    {
        $this->app->singleton('billcodedetails', function($app)
        {
            $configKey = config('sofortlib.billcode.config_key');
            $apiUrl = config('sofortlib.billcode.api_url');
            return new \Sofort\SofortLib\BillcodeDetails($configKey, $apiUrl);
        });
    }

    /**
     * Register the Ideal instance.
     *
     * @return void
     */
    public function registerIdeal()
    {
        $this->app->singleton('ideal', function($app)
        {
            $configKey = config('sofortlib.ideal.config_key');
            $password = config('sofortlib.ideal.password');
            $hashFunction = config('sofortlib.ideal.hash_function');
            return new \Sofort\SofortLib\Ideal($configKey, $password, $hashFunction);
        });
    }

    /**
     * Register the IdealBanks instance.
     *
     * @return void
     */
    public function registerIdealBanks()
    {
        $this->app->singleton('idealbanks', function($app)
        {
            $configKey = config('sofortlib.ideal.config_key');
            $password = config('sofortlib.ideal.password');
            $hashFunction = config('sofortlib.ideal.hash_function');
            return new \Sofort\SofortLib\IdealBanks($configKey, $password, $hashFunction);
        });
    }

    /**
     * Register the Paycode instance.
     *
     * @return void
     */
    public function registerPaycode()
    {
        $this->app->singleton('paycode', function($app)
        {
            $configKey = config('sofortlib.paycode.config_key');
            $apiUrl = config('sofortlib.paycode.api_url');
            return new \Sofort\SofortLib\Paycode($configKey, $apiUrl);
        });
    }

    /**
     * Register the PaycodeDetails instance.
     *
     * @return void
     */
    public function registerPaycodeDetails()
    {
        $this->app->singleton('paycodedetails', function($app)
        {
            $configKey = config('sofortlib.paycode.config_key');
            $apiUrl = config('sofortlib.paycode.api_url');
            return new \Sofort\SofortLib\PaycodeDetails($configKey, $apiUrl);
        });
    }

    /**
     * Register the Sofortüberweisung instance.
     *
     * @return void
     */
    public function registerSofortueberweisung()
    {
        $this->app->singleton('sofortueberweisung', function($app)
        {
            $configKey = config('sofortlib.sofortueberweisung.config_key');
            return new \Sofort\SofortLib\Sofortueberweisung($configKey);
        });
    }

    /**
     * Register the Refund instance.
     *
     * @return void
     */
    public function registerRefund()
    {
        $this->app->singleton('refund', function($app)
        {
            $configKey = config('sofortlib.refund.config_key');
            $apiUrl = config('sofortlib.refund.api_url');
            return new \Sofort\SofortLib\Refund($configKey, $apiUrl);
        });
    }

    /**
     * Register the Refund instance.
     *
     * @return void
     */
    public function registerTransactionData()
    {
        $this->app->singleton('transactiondata', function($app)
        {
            $configKey = config('sofortlib.transactiondata.config_key');
            $apiUrl = config('sofortlib.transactiondata.api_url');
            return new \Sofort\SofortLib\TransactionData($configKey, $apiUrl);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'billcode',
            'billcodedetails',
            'ideal',
            'idealbanks',
            'paycode',
            'paycodedetails',
            'sofortueberweisung',
            'refund',
            'transactiondata'
        ];
    }
}