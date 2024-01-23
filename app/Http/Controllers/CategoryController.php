<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryModel::all()->toArray();
        return array_reverse($categories);
    }

    public function store(Request $request)
    {
    $Category = new CategoryModel([
        'nomcategorie' => $request->input('nomcategorie'),
        'imagecategorie' => $request->input('imagecategorie')
    ]);

    $Category->save();

    return response()->json($Category, 201);
    }

    public function show($id)
    {
    $Category = CategoryModel::find($id);
    return response()->json($Category);
    }

    public function update(Request $request, $id)
    {
    $Category = CategoryModel::find($id);
    $Category->update($request->all());
    return response()->json($Category, 200);
    }

    public function destroy($id)
    {
    $categorie = CategoryModel::find($id);
    $categorie->delete();
    return response()->json('Catégorie supprimée avec succés !');
    }
}
