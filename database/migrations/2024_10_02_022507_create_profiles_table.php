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
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('role_software_id')->nullable()->constrained('role_software');
            $table->string('resume_link')->nullable();
            $table->string('avatar')->nullable();
            $table->string('fullname')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('bio')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('instagram_link')->nullable();
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
        Schema::dropIfExists('profiles');
    }
};
