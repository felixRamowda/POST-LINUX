<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Sus modelos deben usar el rasgo Sluggable, que tiene un
 * método abstracto sluggable()que necesitas definir. Aquí es
 * donde se establece cualquier configuración específica del modelo.
*/

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{ use Sluggable;

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

}
