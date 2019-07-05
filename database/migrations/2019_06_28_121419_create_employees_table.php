<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEmployeesTable extends Migration
{
    public $tableName = 'employees';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
        });
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}