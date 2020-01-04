<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // many to many reletion er ketre akta post er jonno multiple tag takbe 
    // jekane tag table ta alada, abar akta tag er onek gulo post takte pare
    // so ata many to many reletion
    // abar akta tag er just akta category takhe

    public function posts(){

        return $this->belongsToMany(Post::class);

        // akta tag er onek gulo post takte pare    

    }
}
