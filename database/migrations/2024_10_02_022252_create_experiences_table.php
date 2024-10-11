<?php

use App\Domains\Experience\Models\Experience;
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
        Schema::create('experiences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('role_software_id')->nullable()->constrained('role_software')->nullOnDelete();
            $table->string('company_name');
            $table->string('job_title');
            $table->text('job_description');
            $table->enum('level', Experience::$levels);
            $table->boolean('is_current');
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
        Schema::dropIfExists('experiences');
    }
};
