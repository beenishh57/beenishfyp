<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('contact_messages', 'name')) {
                $table->string('name')->after('id');
            }
            
            if (!Schema::hasColumn('contact_messages', 'email')) {
                $table->string('email')->after('name');
            }
            
            if (!Schema::hasColumn('contact_messages', 'phone')) {
                $table->string('phone')->nullable()->after('email');
            }
            
            if (!Schema::hasColumn('contact_messages', 'message')) {
                $table->text('message')->after('phone');
            }
            
            if (!Schema::hasColumn('contact_messages', 'read_at')) {
                $table->timestamp('read_at')->nullable()->after('message');
            }
        });
    }

    public function down()
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            // We'll keep the columns in the down method for safety
            // You can remove them if you want to fully rollback
        });
    }
};