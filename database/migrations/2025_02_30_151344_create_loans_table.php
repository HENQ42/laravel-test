<?php

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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionamento com usuário
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Relacionamento com livro
            $table->date('loan_date')->default(now()); // Data do empréstimo
            $table->date('due_date'); // Data prevista de devolução
            $table->date('return_date')->nullable(); // Data real de devolução
            $table->enum('status', ['pending', 'returned', 'overdue'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
