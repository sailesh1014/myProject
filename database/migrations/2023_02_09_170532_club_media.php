<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('club_media', function (Blueprint $table) {
            $table->id();
            $table->string('media');
            $table->set('type', ['image', 'video']);
            $table->foreignId('club_id')->constrained('clubs')->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
