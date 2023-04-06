<?php
declare(strict_types=1);

use App\Constants\InvitationStatus;
use App\Constants\InvitationType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('invitation_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->set('status', InvitationStatus::LIST)->default('pending');
            $table->set('type', InvitationType::LIST);
        });
    }


    public function down(): void
    {
        Schema::table('invitation_user', function (Blueprint $table) {

        });
    }
};
