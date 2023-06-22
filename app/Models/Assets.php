<?php

namespace App\Models;

use App\Models\Type;
use App\Models\User;
use App\Models\Status;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assets extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function status(){
        return $this->belongsTo(Status::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
   
}



