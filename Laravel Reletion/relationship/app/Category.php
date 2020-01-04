<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //akta categoryr onekgulo post takte pare so one to many reletion here
    // r category table e post name er kichu nai so has asbe

    public function posts(){

    	return $this->hasMany(Post::class);
    }
}
