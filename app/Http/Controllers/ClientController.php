<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;

class ClientController extends Controller
{
    public function index()
    {
        $User = ClientModel::all()->toArray();
        return array_reverse($User);
    }

    public function store(Request $request)
    {
    $User = new ClientModel([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password')
    ]);
    $User->save();

    return response()->json($User, 201);
    }

    public function show($id)
    {
    $User = ClientModel::find($id);
    return response()->json($User);
    }

    public function update(Request $request, $id)
    {
    $User = ClientModel::find($id);
    $User->update($request->all());
    return response()->json($User, 200);
    }

    public function destroy($id)
    {
    $User = ClientModel::find($id);
    $User->delete();
    return response()->json('Client supprimée avec succés !');
    }

    
    





}
