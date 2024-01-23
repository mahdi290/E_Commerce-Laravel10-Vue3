<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','description','gallerie','stock','ScategoryID'];

    public function scategoriess() 
    {return $this->belongsTo(ScategoryModel::class,"ScategoryID"); }
        
}
