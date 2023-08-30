<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string("f_name");          
            $table->string("f_name_hi")->nullable();          
            $table->string("m_name")->nullable();
            $table->string("m_name_hi")->nullable();
            $table->string("l_name");
            $table->string("l_name_hi")->nullable();
            $table->string("mobile_office")->unique();
            $table->string("mobile_home")->nullable()->default("9876543210");
            $table->string("landline_office")->nullable()->default("0757412345");
            $table->string("landline_home")->nullable()->default("0757412345");;
            $table->string("email_office")->unique();
            $table->string("email_personal")->nullable()->default("help@vinayakinfotech@gmail.com");;
            $table->string("image");
            $table->unsignedBigInteger("post_id");
            $table->unsignedBigInteger("department_id");
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("mapping_id");
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreign("department_id")->references("id")->on("departments");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("mapping_id")->references("id")->on("mappings");
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
        Schema::dropIfExists('contacts');
    }
}
