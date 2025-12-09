<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Dashboard')}}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Welcome to the dashboard') }}</p>
    </div>



<!----######################################### SINI CSS EXPENSE DAN FORM #############################################------>

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
    <div class="form-title">Add New Expense</div>

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label class="form-label">Title</label>
                <input name="title" class="form-input" placeholder="e.g. Lunch, Office Supplies">
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <input name="description" class="form-input" placeholder="Short description">
            </div>

            <div class="form-group">
                <label class="form-label">Amount (RM)</label>
                <input type="number" step="0.01" name="amount" class="form-input" placeholder="e.g. 29.90">
            </div>

            <div class="form-group">
                <label class="form-label">Category</label>
                <input name="category" class="form-input" placeholder="Food, Bills, Work">
            </div>

            <div class="form-group">
                <label class="form-label">Date Spent</label>
                <input type="date" name="spent_at" class="form-input">
            </div>

            <div class="form-group notes-group">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-input" placeholder="Optional notes"></textarea>
            </div>

        </div>

        <button type="submit" class="btn-submit">Save Expense</button>
    </form>
</div>


<!----######################################### END CSS EXPENSE DAN FORM ##############################################------>
<style>
    .expense-list {
        max-width: 800px;
        margin: 30px auto;
        font-family: Arial, sans-serif;
    }
    .expense-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 20px;
        margin-bottom: 14px;

        /* Glass effect */
        background: rgba(255, 255, 255, 0.18);
        border-radius: 14px;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);

        border: 1px solid rgba(255, 255, 255, 0.28);
        box-shadow: 0 4px 18px rgba(0,0,0,0.07);
    }

    .expense-info {
        display: flex;
        flex-direction: row;
        gap: 20px;
        flex-wrap: wrap;
        font-size: 14px;
    }

    .expense-info span {
        font-weight: 600;
    }

    .delete-form {
        margin: 0;
    }

    .delete-btn {
        padding: 8px 14px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: 0.25s;
    }

    .edit-btn {
        padding: 8px 14px;
        background:rgb(1, 142, 48);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: 0.25s;
    }

    .delete-btn:hover {
        background: #dc2626;
    }
</style>

<div class="expense-list">

    @foreach ($expenses as $expense)
        <div class="expense-item">

            <div class="expense-info">
                <div><span>ID:</span> {{ $expense->id }}</div>
                <div><span>Time:</span> {{ $expense->created_at->format('H:i:s') }}</div>
                <div><span>Title:</span> {{ $expense->title }}</div>
                <div><span>Desc:</span> {{ $expense->description }}</div>
                <div><span>RM:</span> {{ number_format($expense->amount, 2) }}</div>
                <div><span>Category:</span> {{ $expense->category }}</div>
                <div><span>Notes:</span> {{ $expense->notes }}</div>
            </div>

            <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="delete-btn">Delete</button>
            </form>
            <a href = "{{ route('expenses.edit', $expense) }}" class="edit-btn">Edit</a>

        </div>
    @endforeach

</div>


</x-layouts.app>
