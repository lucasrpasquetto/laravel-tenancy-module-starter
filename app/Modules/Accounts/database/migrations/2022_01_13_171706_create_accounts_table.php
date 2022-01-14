<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('trade_name')->nullable();
            $table->string('federal_tax_number', 18)->unique();
            $table->string('regional_tax_number')->nullable();
            $table->string('municipal_tax_number')->nullable();
            $table->string('email')->unique();
            $table->string('phone');

            $table->string('responsible_name')->nullable();
            $table->string('responsible_federal_tax_number', 18)->nullable();

            $table->string('postal_code', 8);
            $table->text('street');
            $table->string('number')->default('s/n');
            $table->string('complement')->nullable();
            $table->string('district');
            $table->unsignedBigInteger('city_id')->index();

            $table->boolean('is_read_only')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
