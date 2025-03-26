<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('portfolio_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->ipAddress('visitor_ip');
            $table->timestamp('visited_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_views');
    }
};
