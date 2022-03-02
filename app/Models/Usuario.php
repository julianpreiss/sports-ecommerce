<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Usuario
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $rol_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Rol $rol
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Usuario extends \Illuminate\Foundation\Auth\User
{
    use Notifiable;

    protected $table = "usuarios";
    protected $primaryKey = "id";

    protected $fillable = ['email', 'password', 'nombre', 'apellido', 'rol_id']; 

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id');
    }

    public static function rules(): array {
        return [
            'email' => [
                function ($attribute, $value, $fail) {
                    if (Usuario::whereEmail($value)->count() > 0) {
                        $fail($attribute.' está en uso.');
                    }
                },
                'required',
            ],
            'password' => 'required|min:5',
            'nombre' => 'required|min:3',     
            'apellido' => 'required|min:3'     
        ];
    }

    public static function rulesMessages(): array {    

        return [
            'email.required' => 'El email es requerido',
            'password.required' => 'El password es requerido',
            'password.min' => 'El password debe tener mínimamente :min caracteres',          
            'nombre.min' => 'El nombre debe tener mínimamente :min caracteres',          
            'nombre.required' => 'El nombre es requerido',
            'apellido.min' => 'El apellido debe tener mínimamente :min caracteres',          
            'apellido.required' => 'El apellido es requerido',
        ];
    }

}
