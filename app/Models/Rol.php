<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre'];
    
	public $timestamps = false;	

	protected $table = 'roles';

	public function Permisos(){
		return $this->belongsToMany(Permisos::class, 'id_permiso');
	}
	
}
