<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

// class Blog extends Model
// {
//     use HasFactory;
// }

class Blog {
    public static function all() {
        return [
            [
                'id'=>1,
                'title'=>'Blog 1',
                'author'=>'Admin 1',
                'created_at'=>'1 January 2022',
                'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas.'
            ],
            [
                'id'=>2,
                'title'=>'Blog 2',
                'author'=>'Admin 2',
                'created_at'=>'2 January 2022',
                'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, voluptas.'
            ]
            ];
    }

    public static function find($id) : array {
        $blog = Arr::first(self::all(), 
        fn ($blog) => $blog['id'] == $id
    );

        if(!$blog) {
            return abort(404);
        }

        return  $blog;
    }
}
