<?php

namespace CubeAgency\ArboryMenu\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArboryMenu
 * @package CubeAgency\ArboryMenu\Models
 *
 * @property int                                                            $id
 * @property \Carbon\Carbon|null                                            $created_at
 * @property \Carbon\Carbon|null                                            $updated_at
 * @property string                                                         $name
 * @property-read \Illuminate\Database\Eloquent\Collection|ArboryMenuItem[] $items
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenu whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenu whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenu whereName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|ArboryMenu whereUpdatedAt( $value )
 * @mixin Eloquent
 */
class ArboryMenu extends Model
{
    /**
     * @var string
     */
    protected $table = 'arbory_menus';

    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    public function items()
    {
        return $this->hasMany( ArboryMenuItem::class )->orderBy( "position" );
    }
}