<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{
    public function index()
    {
        $Admin = AdminModel::all()->toArray();
        return array_reverse($Admin);
    }

    public function store(Request $request)
    {
    $Admin = new AdminModel([
        'product_id' => $request->input('product_id'),
        'user_id' => $request->input('user_id'),
        'qte' => $request->input('qte')
    ]);
    $Admin->save();

    return response()->json($Admin, 201);
    }

    public function show($id)
    {
    $Admin = AdminModel::find($id);
    return response()->json($Admin);
    }

    public function update(Request $request, $id)
    {
    $Admin = AdminModel::find($id);
    $Admin->update($request->all());
    return response()->json($Admin, 200);
    }

    public function destroy($id)
    {
    $Admin = AdminModel::find($id);
    $Admin->delete();
    return response()->json('Admin supprimé avec succés !');
    }
}
