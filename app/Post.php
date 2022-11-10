<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'body', 'iframe','image', 'user_id'
    ];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' =>  'title',
                 'onUpdate'=> true
            ]
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //Retornar mi nuevo texto formateado..

    public function getGetExcerptAttribute() //para extraer texto del body y sustituirlo por leer mas..
    {
        return substr($this->body, 0, 140);

    }//end_function



    public function getGetImageAttribute() //para extraer texto del body y sustituirlo por leer mas..
    {
        if($this->image)
        {
            return url("storage/$this->image");
        }

    }//end_function

/**
 *  para acceder a la carpeta necesitamos permisos
 * para eso nos vamos a la terminal 'php artisan storage:link'
 *
 */





}

