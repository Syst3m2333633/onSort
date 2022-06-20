<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UpdateSortiesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        //\DB::statement("ALTER TABLE sorties MODIFY COLUMN etat ENUM('Ouverte', 'Clôturée', 'En cours', 'Passée', 'Annulée') DEFAULT 'Ouverte'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
