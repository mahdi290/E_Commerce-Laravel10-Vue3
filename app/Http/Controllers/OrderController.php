<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;

class OrderController extends Controller
{
    public function index()
    {
        $Order = OrderModel::all()->toArray();
        return array_reverse($Order);
    }

    public function store(Request $request)
    {
    $Order = new OrderModel([
        'product_id' => $request->input('product_id'),
        'user_id' => $request->input('user_id'),
        'qte' => $request->input('qte')
    ]);
    $Order->save();

    return response()->json($Order, 201);
    }

    public function show($id)
    {
    $Order = OrderModel::find($id);
    return response()->json($Order);
    }

    public function update(Request $request, $id)
    {
    $Order = OrderModel::find($id);
    $Order->update($request->all());
    return response()->json($Order, 200);
    }

    public function destroy($id)
    {
    $Order = OrderModel::find($id);
    $Order->delete();
    return response()->json('Order supprimé avec succés !');
    }
}
