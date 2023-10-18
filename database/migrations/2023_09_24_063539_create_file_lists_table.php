<?php

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('file_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('permission_id')->nullable();
            $table->string('file_name')->nullable();
            $table->timestamps();
        });
    }

    public function user_id()
    {
        return $this->hasOne(User::class);
    }

    public function permission_id()
    {
        return $this->hasMany(Permission::class);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_lists');
    }
};
