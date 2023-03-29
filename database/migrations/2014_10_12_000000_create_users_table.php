<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name')->unique();
            $table->set('gender', ['male', 'female', 'others'])->default('others');
            $table->string('phone')->nullable();
            $table->string('address');
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('intro_video')->nullable()->comment('only for artist or organizer');
             $table->string('thumbnail')->nullable()->comment('only for artist or organizer');
             $table->set('preference', array_keys(\App\Constants\PreferenceType::LIST))->nullable()->comment('If the artist prefer solo/band');
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('role_id')->nullable()->constrained('roles')->nullOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
