<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
   
    // Show All Expenses
    public function index()
    {
        return view('dashboard', [
            'expenses' => Expense::All()
        ]);
    }

    // Delete Expense
    public function destroy(Expense $expense){
        
        $expense->delete();

        return redirect()->route('dashboard');
    }

    // Edit Expense
    public function edit(Expense $expense)
    {
        return view('expenses.edit', [
            'expense' => $expense
        ]);
    }


    public function update(Request $request, Expense $expense)
    {
        $expense->update([
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'category' => $request->category,
            'notes' => $request->notes,
        ]);

        return redirect()->route('dashboard');
    }


    // Store Expense
    // Create a new expense
    public function store(Request $request)
    {
        Expense::create([
            'title' => $request->title, //'Lunch'
            'description' => $request->description, //makan
            'amount' => $request->amount, //12.50,
            'category' => $request->category, //'Food'
            'notes' => $request->notes, //'Nasi lemak + drink'
        ]);

        return redirect()->route('dashboard');
    }



}
