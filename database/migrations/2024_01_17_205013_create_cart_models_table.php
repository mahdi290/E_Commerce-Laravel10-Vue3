
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartModelsTable extends Migration
{
    
    public function up()
    {
        Schema::create('cart_models', function (Blueprint $table) {
            $table->id();
            $table->string('user_name'); // Change 'user_id' to 'user_name'
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            
        });
    }
    


    public function down()
    {
        Schema::dropIfExists('cart_models');
    }
}
