<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1️⃣ نضيف pending للـ enum مؤقتًا
        DB::statement("
            ALTER TABLE appointments 
            MODIFY status ENUM(
                'booked',
                'pending',
                'confirmed',
                'completed',
                'cancelled',
                'no_show'
            ) NOT NULL DEFAULT 'pending'
        ");

        // 2️⃣ نحول البيانات القديمة
        DB::table('appointments')
            ->where('status', 'booked')
            ->update(['status' => 'pending']);

        // 3️⃣ ننظف enum ونشيل booked نهائيًا
        DB::statement("
            ALTER TABLE appointments 
            MODIFY status ENUM(
                'pending',
                'confirmed',
                'completed',
                'cancelled',
                'no_show'
            ) NOT NULL DEFAULT 'pending'
        ");
    }

    public function down(): void
    {
        // رجوع للوضع القديم
        DB::statement("
            ALTER TABLE appointments 
            MODIFY status ENUM(
                'booked',
                'confirmed',
                'completed',
                'cancelled',
                'no_show'
            ) NOT NULL DEFAULT 'booked'
        ");

        DB::table('appointments')
            ->where('status', 'pending')
            ->update(['status' => 'booked']);
    }
};
