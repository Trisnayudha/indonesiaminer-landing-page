<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')
                ->constrained('subscriptions')
                ->onDelete('cascade');

            // personal fields
            $table->string('name');
            $table->string('company');
            $table->string('job_title');
            $table->string('phone');

            // traffic sources & verticals as JSON arrays
            $table->json('traffic_sources');
            $table->json('verticals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_details');
    }
}
