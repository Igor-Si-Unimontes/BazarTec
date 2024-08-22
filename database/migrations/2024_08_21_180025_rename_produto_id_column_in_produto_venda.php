<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('produto_venda', function (Blueprint $table) {
            $table->renameColumn('produto_id', 'produtos_id');
        });
    }
    
    public function down()
    {
        Schema::table('produto_venda', function (Blueprint $table) {
            $table->renameColumn('produtos_id', 'produto_id');
        });
    }
    
};
