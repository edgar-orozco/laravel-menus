<?php namespace EdgarOrozco\LaravelMenus;

use Eloquent;

class Menu extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    protected $guarded = ['id','created_at','updated_at'];

    public function parent() {
        return $this->hasOne('EdgarOrozco\LaravelMenus\Menu', 'id', 'menu_id');
    }

    public function children() {
        return $this->hasMany('EdgarOrozco\LaravelMenus\Menu', 'menu_id', 'id');
    }

    public function roles(){
        return $this->belongsToMany('Role');
    }

    public static function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('menu_id', '=', NULL)->get();
    }

}
