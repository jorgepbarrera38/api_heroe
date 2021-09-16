<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Http\Requests\HeroFormRequest;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = Hero::orderBy('name')->get();
        return response()->json($heroes, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeroFormRequest $request)
    {
        Hero::create($request->validated());
        return response()->json(['message' => 'Héroe registrado'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function show(Hero $hero)
    {
        return response()->json($hero, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(HeroFormRequest $request, Hero $hero)
    {
        $hero->update($request->validated());
        return response()->json(['message' => 'Héroe actualzado'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        $hero->destroy();
        return response()->json(['Héroe eliminado'], 201);
    }
}
