<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dummy Example
        DB::table('expenses')->insert([
            'user_id' => 1,
            'title' => 'Dummy Expense',
            'description' => 'Dummy Description',
            'amount' => '100',
            'category' => 'Meal',
            'notes' => 'test',
            'created_at' => now(),
            
        ]);

    }
}
