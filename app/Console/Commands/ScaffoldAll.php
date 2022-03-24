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
	protected $signature = "scaffold:all {singularModel?} {pluralModel?} ";

	/**
	 * The console command description.
	 *
	 * @var String
	 */
	protected $description = "Do all the scaffold for a specific model";

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
		# Get argument array
		$arguments = $this->arguments();

		# Validate arguments or ask for them
		$singular	= $arguments[ "singularModel" ] ?? $this->ask( "Please write your model name in singular" );
		$plural		= $arguments[ "pluralModel" ] ?? $this->ask( "Please write your model name in plural" );

		# Call the methods
		$this->call( "make:model", [ "name" => $plural, "-a" => true, "--api" => true ] );
		$this->call( "make:resource", [ "name" => $plural . "Resource" ] );
		$this->call( "make:test", [ "name" => $plural . "Test" ] );

		return 0;
	}
}
