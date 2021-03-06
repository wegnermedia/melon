<?php namespace Melon\Console\Creator;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class ResourceCreatorCommand
 *
 * @package Melon\Console\Creators
 */
class RequestCreatorCommand extends Command
{
	use MelonCreatorTrait;

	/**
	 * @var Collection
	 */
	protected $data;

	/**
	 * The console command name.
	 *
	 * php artisan create:resource
	 *
	 * @var string
	 */
	protected $name = 'create:request';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'The Melon Way to create a new request ...';

	/**
	 *
	 */
	public function handle()
	{
		$element    = $this->argument('element');
		$component  = $this->argument('component');
		$name       = $this->argument('name');

		$this->collectData($component, $name, $element);

		$this->createRequest();

		$this->info('Whohoooo, Request created ...');
	}
	
	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['element', InputArgument::REQUIRED, 'Name of the element (Frontend | Backend | Api)'],
			['component', InputArgument::REQUIRED, 'Name of the component (e.g. Shop, Blog, Base, Forum)'],
			['name', InputArgument::REQUIRED, 'Name of the service itself (e.g. LanguageController)'],
		];
	}
} 