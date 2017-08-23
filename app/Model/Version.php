<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Traits\VersionTraits;

class Version extends Model
{

    use SoftDeletes,VersionTraits;

    protected $table ='version';




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','e_id', 'user_id', 'content','db_content','env_content','project','app'
    ];

    public function author()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
