<?php

namespace CubeAgency\ArboryMenu\Models;

use Illuminate\Database\Eloquent\Model;


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
}