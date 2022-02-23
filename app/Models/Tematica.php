<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tematica
 *
 * @property int $tematica_id
 * @property string $categoria
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tematica newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tematica newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tematica query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tematica whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tematica whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tematica whereTematicaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tematica whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tematica extends Model
{
    protected $table = 'tematicas';
    protected $primaryKey = 'tematica_id';

}
