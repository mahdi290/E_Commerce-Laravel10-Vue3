<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScategoryModel extends Model
{
    use HasFactory;
    protected $fillable = ['nomscategorie','imagescategorie','categorieID'];

    public function categories()
    {return $this->belongsTo(CategoryModel::class,"categorieID");}

    public function product()
    {return $this->HasMany(ProductModel::class,"ScategoryID");}

}
