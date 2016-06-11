<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectTypesAndProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            # Add a new INT field called `author_id` that has to be unsigned (i.e. positive)
            $table->integer('type_id')->unsigned();

            # This field `author_id` is a foreign key that connects to the `id` field in the `authors` table
            $table->foreign('type_id')->references('id')->on('types');

        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('products_type_id_foreign');

            $table->dropColumn('type_id');
        });
    }
}
