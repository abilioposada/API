<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @group AuthorsTest
 * @group Tests
 */
class AuthorsTest extends TestCase
{
	private const BASE_URI = "/api/authors/"; # Base URI endpoint to test

	/**
	 * Get resources with pagination and test the structure
	 * 
	 * @return void
	 */
	public function testGetAll () : void
	{
		$response = $this->get( self::BASE_URI );

		$response
			->assertOk()
			->assertJsonStructure(
				[
					"data",
					"links"	=> [ "first", "last", "prev", "next" ],
					"meta"	=> [
						"current_page", "from", "last_page", "path", "per_page", "to", "total"
					]
				]
			)
			->assertJson(
				[
					"meta" => [
						"path" => url( '/' ) . subStr( self::BASE_URI, 0, -1 )
					]
				]
			);
	}
	
	/**
	 * Intentionally fails on creation
	 * 
	 * @return void
	 */
	public function testFailedCreateOne () : void
	{
		$response = $this->post( self::BASE_URI, [ "name" => "Ab" ] );

		$response->assertStatus( 422 );
	}

	/**
	 * Creates a resource
	 * 
	 * @return Array resource data created
	 */
	public function testCreateOne () : Array
	{
		$test		= "Test";
		$response	= $this->post( self::BASE_URI, [ "name" => $test ] );

		$response
			->assertCreated()
			->assertJsonStructure(
				[
					"data" => [ "id", "updated_at", "created_at" ]
				]
			)
			->assertJson(
				[
					"data" => [ "name" => $test ]
				]
			);

		return [
			"id"	=> $response[ "data" ][ "id" ],
			"name"	=> $test
		];
	}

	/**
	 * Get a single resource
	 * @depends testCreateOne
	 * 
	 * @param Array $data Resource information
	 * @return Int ID resource retrieved
	 */
	public function testGetOne ( $data ) : Int
	{
		$response = $this->get( self::BASE_URI . $data[ "id" ] );

		$response
			->assertOk()
			->assertJsonStructure(
				[
					"data" => [ "id", "name" ]
				]
			)
			->assertJson(
				[
					"data" => [ "name" => $data[ "name" ] ]
				]
			);
		
		return $response[ "data" ][ "id" ]; # Identifier of the resource
	}

	/**
	 * Update an specific resource
	 * @depends testGetOne
	 * 
	 * @param Int $id Resource identification
	 * @return void
	 */
	public function testUpdateOne ( $id ) : void
	{
		$response = $this->put( self::BASE_URI . $id, [ "name" => "Test 2" ] );

		$response->assertOk(); # Response OK 200

		$this->assertEquals( $response->getContent(), 1 ); # Rows affected
	}

	/**
	 * Delete an specific resource
	 * @depends testGetOne
	 * 
	 * @param Int $id Resource identification
	 * @return void
	 */
	public function testDeleteOne ( $id ) : void
	{
		$response = $this->delete( self::BASE_URI . $id ); # Deletes the test resource

		$response->assertOk(); # Response OK 200

		$this->assertEquals( $response->getContent(), 1 ); # Rows affected
	}
}