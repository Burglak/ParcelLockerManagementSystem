<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('courier_id');
            $table->unsignedBigInteger('start_locker_id');
            $table->unsignedBigInteger('end_locker_id');
            $table->string('name');
            $table->string('code');
            $table->string('description');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();

            $table->foreign('sender_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->foreign('receiver_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->foreign('courier_id')
                  ->references('id')
                  ->on('couriers')
                  ->onDelete('cascade');
            
            $table->foreign('start_locker_id')
                  ->references('id')
                  ->on('parcel_lockers')
                  ->onDelete('cascade');
            
            $table->foreign('end_locker_id')
                  ->references('id')
                  ->on('parcel_lockers')
                  ->onDelete('cascade');
            
            $table->foreign('status_id')
                  ->references('id')
                  ->on('parcel_statuses')
                  ->onDelete('cascade');
            
            $table->foreign('type_id')
                  ->references('id')
                  ->on('parcel_types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};
