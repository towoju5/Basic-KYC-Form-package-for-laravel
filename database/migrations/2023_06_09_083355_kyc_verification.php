<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KycVerification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kyc_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('address');
            $table->string('email');
            $table->string('id_number');
            $table->string('date_of_birth');
            $table->string('id_document', 1000)->nullable();
            $table->string('proof_of_address', 1000)->nullable();
            $table->string('additional_document', 1000)->nullable();
            $table->boolen('approved_at')->nullable();
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
        //
    }
}
