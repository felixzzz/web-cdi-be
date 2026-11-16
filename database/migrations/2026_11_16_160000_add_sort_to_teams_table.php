<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->integer('sort')->default(0);
        });

        // Initialize sort for existing records per type in ascending created_at order
        $types = DB::table('teams')->select('type')->distinct()->pluck('type');
        foreach ($types as $type) {
            $items = DB::table('teams')
                ->where('type', $type)
                ->orderBy('created_at', 'asc')
                ->orderBy('id', 'asc')
                ->get();

            $sort = 1;
            foreach ($items as $item) {
                DB::table('teams')->where('id', $item->id)->update(['sort' => $sort++]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('sort');
        });
    }
};
