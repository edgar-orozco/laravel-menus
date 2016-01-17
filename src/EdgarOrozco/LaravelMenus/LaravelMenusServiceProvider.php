<?php namespace EdgarOrozco\LaravelMenus;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LaravelMenusServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('edgar-orozco/laravel-menus');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		/**
		 * Genera el HTML del menú desde la base de datos
		 * @return Regresa el HTML del menu
		 */
		$this->app->bind('Menu', function () {

			$items = Menu::tree();

			//Si no existe el arreglo de plantillas de menú en la sesión entonces creamos el arreglo en las plantillas
			$menu = Session::get('menu');
			if (!$menu) {
				$menu = View::make('laravel-menus::layouts._nav', compact('items'))->render();
				Session::put('menu', $menu);
			}
			return $menu;
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
