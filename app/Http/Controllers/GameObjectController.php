<?php

namespace App\Http\Controllers;
use App\Models\GameObject;
use Illuminate\Http\Request;
use App\Jobs\ProcessGameObject;
use Illuminate\Support\Facades\Cache;

class GameObjectController extends Controller
{
    public function index()
    {
        // If the cache is empty (first run), provide an empty array
        $leaderboard = Cache::get('global_leaderboard', []);

        return response()->json([
            'source' => 'cache',
            'data' => $leaderboard
        ]);
    }

    public function show(GameObject $id)
    {
        return response()->json($id);
    }

    public function store(Request $request)
    {
        $object = GameObject::create($request->all());

        /*
        $object = GameObject::create([
            'name'        => $request->name,
            'shape'       => (string)$request->shape, 
            'color'       => $request->color,
            'size'        => $request->size,
            'rigidbody'   => $request->rigidbody,
            'use_gravity' => $request->useGravity, 
            'bounciness'  => $request->bounciness,
            'friction'    => $request->friction,
        ]);
        */

        ProcessGameObject::dispatch($object);

        return response()->json($object, 201);
    }

    public function getNames()
    {
        return GameObject::pluck('name'); 
    }

    public function getCount()
    {
        return GameObject::count();
    }

    public function getIds()
    {
        return GameObject::pluck('id');
    }
}
