<?php
declare(strict_types=1);

use App\Constants\EventStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('excerpt');
            $table->longText('description');
            $table->string('thumbnail');
            $table->float('fee')->default(0);
            $table->set('status', EventStatus::LIST)->default(EventStatus::DRAFT);
            $table->set('preference', array_keys(\App\Constants\PreferenceType::LIST))->comment('If the event is for solo/band');
            $table->dateTime('event_date');
            $table->foreignId('club_id')->nullable()->constrained('clubs')->nullOnDelete();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
