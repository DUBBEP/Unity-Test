<?php

namespace App\Http\Controllers;
use App\Models\GameObject;
use Illuminate\Http\Request;

class GameObjectController extends Controller
{
    public function index()
    {
        $objects = GameObject::all();

        return response()->json($objects);
    }

    public function show(GameObject $id)
    {
        return response()->json($id);
    }

    public function store(Request $request)
    {
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
