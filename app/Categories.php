<?php

namespace App;
use Kalnoy\Nestedset\NodeTrait;

use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{
    use NodeTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'parent_id', 'slug'
    ];


    public static function getTree()
    {
        $categories = self::get()->toTree();
        $traverse = function ($categories, $prefix = '-') use (&$traverse, &$allCats) {

            foreach ($categories as $category) {
                $allCats[] = ["name" => $prefix.' '.$category->name, "id" => $category->id];
                $traverse($category->children, $prefix.'-');
            }

            return $allCats;
        };

        return $traverse($categories);
    }
    public static function getList() {
        $categories = self::get()->toTree();
        $lists = '<li class="dropdown mega-menu">';
        foreach($categories as $category)
            $lists .= self::renderNodeHP($category);
        $lists .= "</li>";
        return $lists;
    }
    public static function renderNodeHP($node) {
        $list = '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/'.$node->slug.'">'.$node->name.'</a>';
        if ( $node->children()->count() > 0 ) {
            $list .= '<ul class="dropdown-menu">';
            foreach($node->children as $child)
                $list .= self::renderNodeHP($child);
            $list .= "</ul>";
        }
        $list .= "</li>";
        return $list;
    }

    public function products()
    {
        return $this->hasMany('App\Products', 'category_id', 'id');
    }
}
