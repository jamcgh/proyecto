<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    use SoftDeletes;
    protected $softDelete = true;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($obj) {
            if (!is_null(Auth::user())) {
                $obj->userid_created_at = Auth::user()->id ;
                $obj->user_created_at = Auth::user()->name;
            }
        });
        static::updating(function ($obj) {
             if (!is_null(Auth::user())) {
                $obj->userid_updated_at =  Auth::user()->id ;
                $obj->user_updated_at = Auth::user()->name;
             }
        });
        static::deleting(function ($obj) {
            
            $obj->userid_deleted_at = Auth::user()->id;
            $obj->user_deleted_at = Auth::user()->name;
        });
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("Y-m-d h:i:s a");
    }
}
