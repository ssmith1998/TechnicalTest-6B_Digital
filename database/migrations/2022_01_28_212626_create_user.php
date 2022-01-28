<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Factories\UserFactory;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        User::factory()->createOne();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        User::find(1)->delete();
    }
}
