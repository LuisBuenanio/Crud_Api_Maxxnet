<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Registro extends Model
{
   
    use HasApiTokens, HasFactory;
    protected $table = 'registros';
    protected $primaryKey = 'id';


    protected $fillable = [
        'titulo',
        'descripcion',
        'valor',
        'email',
        'url_referencia',
        'user_id'
        
    ];

    protected $hidden = [
        'id',
        'user_id',
     ];
     
    public $timestamps = false;

  /*   Relacion de uno a muchos inversa */
  public function users(){
    return $this->belongsTo(User::class);
  }


}
