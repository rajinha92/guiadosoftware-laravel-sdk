<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 04/10/17
 * Time: 14:46
 */

namespace GDS\Providers;


use GuiaDoSoftwareSdk\Api;
use Illuminate\Support\ServiceProvider;

class GuiaDoSoftwareServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->singleton(Api::class, function ()
		{
			return new Api(config('gds.url'), config('gds.token'));
		});
	}

	public function boot()
	{
		$this->publishes(
			[basename(__DIR__) . 'config/gds.php' => config_path('gds.php'),]
		);
	}
}