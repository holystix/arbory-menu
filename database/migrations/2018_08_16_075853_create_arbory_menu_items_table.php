<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArboryMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'arbory_menu_items', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->timestamps();
            $table->integer( 'position' )->nullable();
            $table->integer( 'arbory_menu_id' )->unsigned();
            $table->string( 'name' )->nullable();
            $table->string( 'link' )->nullable();

            $table->foreign( 'arbory_menu_id' )
                ->references( 'id' )
                ->on( 'arbory_menus' )
                ->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'arbory_menu_items' );
    }
}
