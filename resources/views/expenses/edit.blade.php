<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Dashboard')}}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Welcome to the dashboard') }}</p>
    </div>

<!-- CSS -->
<style>
    .form-card {
        max-width: 700px;
        margin: 30px auto;
        background: #464646ff;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        font-family: Arial, sans-serif;
    }
    .form-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
    }
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }
    .form-group {
        display: flex;
        flex-direction: column;
    }
    .form-label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 6px;
    }
    .form-input {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid #ffffffff;
        border-radius: 10px;
        font-size: 14px;
        transition: 0.2s;
    }
    .form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 5px rgba(59,130,246,0.3);
        outline: none;
    }
    .notes-group textarea {
        height: 80px;
        resize: vertical;
    }
    .btn-submit {
        width: 100%;
        padding: 14px;
        background: #3b82f6;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 15px;
        transition: 0.25s;
    }
    .btn-submit:hover {
        background: #2563eb;
    }
</style>

<div class="form-card">
    <div class="form-title">Edit Expense</div>

    <form action="{{ route('expenses.update', $expense) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">

            <div class="form-group">
                <label class="form-label">Title</label>
                <input name="title" class="form-input" placeholder="e.g. Lunch, Office Supplies" value="{{ $expense->title }}">
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <input name="description" class="form-input" placeholder="Short description" value="{{ $expense->description }}">
            </div>

            <div class="form-group">
                <label class="form-label">Amount (RM)</label>
                <input type="number" step="0.01" name="amount" class="form-input" placeholder="e.g. 29.90" value="{{ $expense->amount }}">
            </div>

            <div class="form-group">
                <label class="form-label">Category</label>
                <input name="category" class="form-input" placeholder="Food, Bills, Work" value="{{ $expense->category }}">
            </div>

            <div class="form-group">
                <label class="form-label">Date Spent</label>
                <input type="date" name="spent_at" class="form-input" value="{{ $expense->created_at->format('Y-m-d') }}">
            </div>

            <div class="form-group notes-group">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-input" placeholder="Optional notes">{{ $expense->notes }}</textarea>
            </div>

        </div>

        <button type="submit" class="btn-submit">Update</button>
    </form>
</div>



</x-layouts.app>
