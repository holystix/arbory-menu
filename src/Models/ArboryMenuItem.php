<?php

namespace CubeAgency\ArboryMenu\Models;

use Arbory\Base\Content\Relation;
use Illuminate\Database\Eloquent\Model;

class ArboryMenuItem extends Model
{
    /**
     * @var string
     */
    protected $table = 'arbory_menu_items';

    /**
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'position',
        'name',
        'link'
    ];

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function owner()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphOne
     */
    public function relation()
    {
        return $this->morphOne( Relation::class, 'owner' );
    }
}