<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScategoryModel;

class ScategoryController extends Controller
{
    public function index()
    {
    $SCategory = ScategoryModel::with('product')->get();
    return $SCategory;
    }

    public function store(Request $request)
    {
    $SCategory = new ScategoryModel([
    'nomscategorie' => $request->input('nomscategorie'),
    'imagescategorie' => $request->input('imagescategorie'),
    'categorieID' => $request->input('categorieID'),
    ]);
    $SCategory->save();
    return response()->json($SCategory,201);
    }

    public function show($id)
    {
    $SCategory = ScategoryModel::find($id);
    return response()->json($SCategory);
    }

    public function update(Request $request, $id)
    {
    $SCategory = ScategoryModel::find($id);
    $SCategory->update($request->all());
    return response()->json($SCategory,200);
    }

    public function destroy($id)
    {
    $SCategory = ScategoryModel::find($id);
    $SCategory->delete();
    return response()->json('Sous catégorie supprimée avec succés !');
    }

    public function showSCategorieByCAT($idcat)
    {
    $SCategory= ScategoryModel::where('categorieID', $idcat)->with('categories')->get();
    return response()->json($SCategory);
    }



}
