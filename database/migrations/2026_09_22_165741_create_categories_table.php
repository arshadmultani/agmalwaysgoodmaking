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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Insert initial categories
        $defaultCategories = [
            ['name' => 'Modular Kitchen', 'slug' => 'modular_kitchen', 'description' => 'Acrylic, laminate, and Italian minimalist modular kitchens', 'sort_order' => 1],
            ['name' => 'Sliding Wardrobe', 'slug' => 'wardrobe', 'description' => 'Designer sliding, hinged, and printed glass wardrobes', 'sort_order' => 2],
            ['name' => 'Aluminium Glazing', 'slug' => 'glazing', 'description' => 'Toughened glass partitions, sliding windows, and office glazing', 'sort_order' => 3],
            ['name' => 'False Ceiling', 'slug' => 'ceiling', 'description' => 'POP and gypsum designer ceilings with ambient LED lighting', 'sort_order' => 4],
            ['name' => 'Turnkey Interior', 'slug' => 'interior', 'description' => 'End-to-end bungalow, flat, and villa interior execution', 'sort_order' => 5],
            ['name' => 'Commercial Work', 'slug' => 'commercial', 'description' => 'Retail showrooms, office workstations, and corporate interiors', 'sort_order' => 6],
        ];

        foreach ($defaultCategories as $cat) {
            DB::table('categories')->insert(array_merge($cat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Normalize portfolio category 'kitchen' to 'modular_kitchen' if any exist
        DB::table('portfolio_items')
            ->where('category', 'kitchen')
            ->update(['category' => 'modular_kitchen']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
