<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScaffoldAll extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var String
	 */
	protected $signature = 'command:name';

	/**
	 * The console command description.
	 *
	 * @var String
	 */
	protected $description = 'Command description';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct ()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return Int
	 */
	public function handle () : Int
	{
		return 0;
	}
}
