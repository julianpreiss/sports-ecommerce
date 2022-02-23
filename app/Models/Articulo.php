<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Articulo
 *
 * @property int $id
 * @property string $titulo
 * @property string $preview
 * @property string $articulo
 * @property string|null $imagen
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tematica[] $tematicas
 * @property-read int|null $tematicas_count
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereArticulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Articulo extends Model
{
    //use HasFactory;
    protected $fillable = ['titulo', 'preview', 'articulo', 'imagen'];    

    public static function rules(): array {
        return [
            'titulo' => 'required|min:5',
            'preview' => 'required|max:140',
            'articulo' => 'required',    
        ];
    }

    public static function rulesMessages(): array {    

        return [
            'titulo.required' => 'El titulo del artículo es requerido',
            'titulo.min' => 'El titulo debe tener mínimamente :min caracteres',
            'preview.required' => 'El preview del artículo es requerido',
            'preview.max' => 'El preview del artículo excede el máximo de :max caracteres',
            'artículo.required' => 'El contenido del artículo es requerido',       
        ];
    }

    public function tematicas(){
        return $this->belongsToMany(Tematica::class, 'articulos_tienen_tematicas', 'id', 'tematica_id', 'id', 'tematica_id');
    }
}
