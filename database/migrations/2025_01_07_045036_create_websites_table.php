<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key referencing users table
            $table->string('name');
            $table->string('url');
            $table->string('masked_url');
            $table->integer('monthly_traffic')->nullable();
            $table->integer('domain_rating')->nullable();
            $table->integer('domain_authority')->nullable();
            $table->float('spam_score', 5, 2)->default(0);
            $table->string('turnaround_time')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('language')->nullable();
            $table->tinyInteger('quality_score')->unsigned()->nullable();
            $table->integer('max_dofollow_links')->nullable();
            $table->text('content_guidelines')->nullable();
            $table->integer('minimum_word_count')->nullable();
            $table->json('allowed_link_types')->nullable();
            $table->json('payment_methods')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
