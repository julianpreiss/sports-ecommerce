<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Producto
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $nombre
 * @property string $marca
 * @property string $deporte
 * @property string $precio
 * @property string|null $imagen
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDeporte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereMarca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Producto extends Model
{
    //use HasFactory;
    protected $fillable = ['nombre', 'marca', 'deporte', 'precio', 'imagen'];    

    public static function rules(): array {
        return [
            'nombre' => 'required|min:3',
            'marca' => 'required',
            'deporte' => 'required',
            'precio' => 'required|numeric',            
        ];
    }

    public static function rulesMessages(): array {    

        return [
            'nombre.required' => 'El nombre del producto es requerido',
            'nombre.min' => 'El nombre debe tener mínimamente :min caracteres',
            'marca.required' => 'La marca del producto es requerido',
            'deporte.required' => 'El deporte del producto es requerido',
            'precio.required' => 'El precio del producto es requerido',
            'precio.numeric' => 'El precio tiene que estar expresado con números',            
        ];
    }
}
