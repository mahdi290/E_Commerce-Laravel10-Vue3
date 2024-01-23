<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    public function index()
    {
    $Product = ProductModel::with('scategoriess')->get();
    return $Product;
    }


    public function store(Request $request){
        try {
            {
                $Product = new ProductModel([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'gallerie' => $request->input('gallerie'),
                'stock' => $request->input('stock'),
                'scategorieID' => $request->input('scategorieID')]);
                
                $Product->save();
                return response()->json($Product,200);}
        } catch (\Throwable $th) {
            return response()->json($Product,500);
        }
      
        }

        public function show($id)
        {
        $Product= ProductModel::find($id);
        return response()->json($Product);
        }


        public function update($id, Request $request)
        {
        try {
        {
        $Product = ProductModel::find($id);
        $Product->update($request->all());
        return response()->json($article,201);
        }
        }
        catch (\Throwable $th) {
            return response()->json($Product,500);
        }}

        public function destroy($id){
            try {
        {
        $article = ProductModel::find($id);
        $article->delete();
        return response()->json('Produit Supprimé avec succes');
        }
        } 
        catch (\Throwable $th) {
            return response()->json($Product,500);
        }
        }

        public function showProduitBySCAT($idcat)
    {
    $SCategory= ProductModel::where('ScategoryID', $idcat)->with('scategoriess')->get();
    return response()->json($SCategory);
    }
        

}
