<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Post;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Hacemos la relacion: un usuario puede tener muchos post pero un post solo
     * pueder pertenecer a un usuario, en este caso la relacion es de 1 a M
     * */
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    //la base de datos cuenta con la configuracion pero siempre debemos hacer
    //la configuracion en laravel


}
