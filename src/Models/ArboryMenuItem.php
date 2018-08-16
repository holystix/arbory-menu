<?php

namespace CubeAgency\ArboryMenu\Models;

use Arbory\Base\Content\Relation;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArboryMenuItem
 * @package CubeAgency\ArboryMenu\Models
 *
 * @property int                                               $id
 * @property \Carbon\Carbon|null                               $created_at
 * @property \Carbon\Carbon|null                               $updated_at
 * @property int                                               $menu_id
 * @property int|null                                          $position
 * @property string|null                                       $name
 * @property string|null                                       $link
 * @property-read \Illuminate\Database\Eloquent\Model|Eloquent $owner
 * @property-read \Arbory\Base\Content\Relation                $relation
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenuItem whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenuItem whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenuItem whereMenuId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenuItem wherePosition( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenuItem whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenuItem whereLink( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenuItem whereName( $value )
 * @mixin Eloquent
 */
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