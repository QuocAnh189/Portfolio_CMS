<?php

use App\Enum\Status;
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
        Schema::create('education', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->string('logo');
            $table->float('gpa');
            $table->string('university_name');
            $table->foreignUuid('major_id')->nullable()->constrained('majors')->nullOnDelete();
            $table->text('description');
            $table->boolean('degree');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', Status::toArray())->default(Status::Active->value);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
