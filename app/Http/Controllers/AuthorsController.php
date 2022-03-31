<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorsRequest;
use App\Http\Requests\UpdateAuthorsRequest;
use App\Http\Resources\AuthorsResource;
use App\Models\Authors;

class AuthorsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index ()
	{
		return AuthorsResource::collection( Authors::paginate() );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \App\Http\Requests\StoreAuthorsRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store ( StoreAuthorsRequest $request )
	{
		return new AuthorsResource( Authors::create( $request->validated() ) );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Authors $authors
	 * @return \Illuminate\Http\Response
	 */
	public function show ( Authors $authors )
	{
		return new AuthorsResource( $authors );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \App\Http\Requests\UpdateAuthorsRequest $request
	 * @param \App\Models\Authors $authors
	 * @return \Illuminate\Http\Response
	 */
	public function update ( UpdateAuthorsRequest $request, Authors $authors )
	{
		return $authors->update( $request->validated() );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Authors $authors
	 * @return \Illuminate\Http\Response
	 */
	public function destroy ( Authors $authors )
	{
		return $authors->delete();
	}
}
