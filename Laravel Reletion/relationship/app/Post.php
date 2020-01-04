<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //same table er modde takle belongs to. onno table e takle has one/has many

    // Protita post er jonno akta category id so belongsTo use korbo bcz it is one to one reletionship. jodi onno table e takto tahole hasOne use kortam

    public function Category(){

    	return $this->belongsTo(Category::class);

    	// we can write here belongsTO(App\Category) also instead of Category class.
    }



    // many to many reletion er ketre akta post er jonno multiple tag takbe 
    // jekane tag table ta alada, abar akta tag er onek gulo post takte pare
    // so ata many to many reletion
    // abar akta tag er just akta category takhe

    public function tags(){

        return $this->belongsToMany(Tag::class);

        // akta post er onek gulo tag takte pare    }

    }


    // similarly user er ketreo amra korte pari
    // Because akta post tho akta user er e takbe

     public function user(){

    	return $this->belongsTo(User::class);

    	// we can write here belongsTO(App\Category) also instead of Category class.
    }


}
