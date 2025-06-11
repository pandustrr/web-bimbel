<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            if (!Schema::hasColumn('jadwals', 'kuota')) {
                $table->integer('kuota')->default(5);
            }
            if (!Schema::hasColumn('jadwals', 'terdaftar')) {
                $table->integer('terdaftar')->default(0);
            }
        });

        Schema::table('pendaftarans', function (Blueprint $table) {
            if (!Schema::hasColumn('pendaftarans', 'jadwal_id')) {
                $table->foreignId('jadwal_id')->nullable()->constrained('jadwals');
            }
        });
    }

    public function down()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->dropColumn(['kuota', 'terdaftar']);
        });

        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropForeign(['jadwal_id']);
            $table->dropColumn('jadwal_id');
        });
    }
};
