<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up () : void
	{
		Schema::create( "authors", function ( Blueprint $tbl )
			{
				$tbl->id();

				$tbl->string( "name" )
					->default( "Anonym" );

				$tbl->string( "nationality" )
					->default( "Unknown" );

				$tbl->enum( $column = "gender", $allowed = [ 'M', 'F', 'O' ] )
					->comment( "Male, Female, Other" )
					->default( 'O' );

				$tbl->date( "date_of_birth" )
					->nullable()
					->default( null );

				$tbl->timestamps();
			}
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down () : void
	{
		Schema::dropIfExists( "authors" );
	}
}
