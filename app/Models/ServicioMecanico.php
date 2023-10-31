<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioMecanico extends Model
{
    use HasFactory;
    protected $table = 'servicios_mecanicos';

    protected $fillable = [

        'fechaInicio',
        'fechaFin',
        'precioes',
        'precio',
        'hora1',
        'hora2',
        'rubro',
        'logo',
        'servicios',
        'descripcion',
        'tipoServicio',
        'acreditacion_1',
        'acreditacion_2',
        'acreditacion_3',
        'acreditacion_4',
        'id_perfil',
        'id_user'

    ];

    public function contrataciones()
    {
        return $this->hasMany(Contratacion::class);
    }

    // En el modelo ServicioMecanico
    public function perfil()
    {
        return $this->belongsTo(perfil::class, 'id_perfil');
    }

}