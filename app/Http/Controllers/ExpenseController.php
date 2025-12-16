<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
   
    // Show All Expenses
    public function index()
    {
        return view('dashboard', [
            'expenses' => Auth::user()->expenses
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
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|string',
            'category' => 'required',
            'notes' => 'required',
        ]);       
        
        
        Expense::create([
            'user_id' => auth()->user()->id, //foreign id as user id
            'title' => $request->title, //'Lunch'
            'description' => $request->description, //makan
            'amount' => $request->amount, //12.50,
            'category' => $request->category, //'Food'
            'notes' => $request->notes, //'Nasi lemak + drink'
        ]);

        return redirect()->route('dashboard');
    }



}
