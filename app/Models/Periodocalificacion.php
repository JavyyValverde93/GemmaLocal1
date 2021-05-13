<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodocalificacion extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','fecha_inicio','fecha_fin'];
    
	protected $table = "periodoscalificaciones";

	public $timestamps = false;	
	
}
