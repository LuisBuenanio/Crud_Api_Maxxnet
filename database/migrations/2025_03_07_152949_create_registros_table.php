<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();                     
            $table->longtext('descripcion')->nullable(); 
            $table->float('valor')->nullable();                          
            $table->email('email')->nullable(); 
            $table->string('url_referencia')->nullable();
            $table->timestamps('fecha_creacion');
            $table->timestamps();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');       
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
