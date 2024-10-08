<?php

declare(strict_types=1);

use Datomatic\DatabaseOpeningHours\Enums\Day;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opening_hours_days', static function (Blueprint $table): void {
            $table->id();
            $table->foreignId('opening_hour_id')->constrained();
            $table->enum('day', array_column(Day::cases(), 'value'));
            $table->string('description')->nullable();
            $table->timestamps();

            $table->unique(['opening_hour_id', 'day']);
        });
    }
};
