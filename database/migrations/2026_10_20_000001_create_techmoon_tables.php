<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pillars', function (Blueprint $table) { $table->id(); $table->string('name'); $table->string('slug')->unique(); $table->text('description'); $table->string('icon')->default('rocket'); $table->timestamps(); });
        Schema::create('products', function (Blueprint $table) { $table->id(); $table->foreignId('pillar_id')->constrained()->cascadeOnDelete(); $table->string('name'); $table->string('slug')->unique(); $table->text('description'); $table->decimal('price',12,2)->nullable(); $table->enum('price_type',['tetap','mulai_dari','negosiasi'])->default('negosiasi'); $table->integer('stock')->nullable(); $table->string('image')->nullable(); $table->boolean('is_featured')->default(false); $table->boolean('is_active')->default(true); $table->timestamps(); $table->index(['is_active','is_featured']); });
        Schema::create('customers', function (Blueprint $table) { $table->id(); $table->string('name'); $table->string('email')->unique(); $table->string('phone',40)->nullable(); $table->enum('segment',['korporat','umkm','pendidikan','umum'])->default('umum'); $table->string('organization')->nullable(); $table->timestamps(); });
        Schema::create('inquiries', function (Blueprint $table) { $table->id(); $table->foreignId('customer_id')->constrained()->cascadeOnDelete(); $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete(); $table->foreignId('handled_by')->nullable()->constrained('users')->nullOnDelete(); $table->text('message'); $table->decimal('budget',12,2)->nullable(); $table->enum('status',['baru','diproses','deal','batal'])->default('baru')->index(); $table->text('internal_note')->nullable(); $table->timestamps(); });
        Schema::create('events', function (Blueprint $table) { $table->id(); $table->foreignId('pillar_id')->constrained()->cascadeOnDelete(); $table->string('title'); $table->enum('type',['bootcamp','seminar']); $table->text('description'); $table->dateTime('start_at')->index(); $table->string('location'); $table->unsignedInteger('quota'); $table->decimal('fee',12,2)->default(0); $table->enum('status',['draft','buka','penuh','selesai'])->default('draft')->index(); $table->string('image')->nullable(); $table->timestamps(); });
        Schema::create('event_registrations', function (Blueprint $table) { $table->id(); $table->foreignId('event_id')->constrained()->cascadeOnDelete(); $table->foreignId('customer_id')->constrained()->cascadeOnDelete(); $table->enum('status',['terdaftar','hadir','batal'])->default('terdaftar')->index(); $table->timestamp('registered_at')->useCurrent(); $table->timestamps(); $table->unique(['event_id','customer_id']); });
        Schema::create('portfolios', function (Blueprint $table) { $table->id(); $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete(); $table->string('title'); $table->text('description'); $table->string('client_name'); $table->string('image')->nullable(); $table->string('project_url')->nullable(); $table->timestamps(); });
        Schema::create('testimonials', function (Blueprint $table) { $table->id(); $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete(); $table->string('name'); $table->text('content'); $table->unsignedTinyInteger('rating')->default(5); $table->boolean('is_published')->default(false)->index(); $table->timestamps(); });
    }
    public function down(): void { foreach (['testimonials','portfolios','event_registrations','events','inquiries','customers','products','pillars'] as $table) Schema::dropIfExists($table); }
};
