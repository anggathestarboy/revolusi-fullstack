<?php

namespace App\Livewire\Admin\Author;

use Livewire\Component;
use App\Models\Borrowing;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class BorrowingTable extends Component
{
    use WithPagination;

    public $searchStudent = '';
    public $selectedBorrowing;
public $showModal = false;


    protected $paginationTheme = 'tailwind';

    public function updating($field)
    {
        if ($field === 'searchStudent' || $field === 'searchBook') {
            // $this->resetPage();
        }
    }

   public function render()
{
   $borrowings = Borrowing::with(['user', 'details.book'])
    ->when($this->searchStudent, function ($query) {
        $query->whereHas('user', function ($q) {
            $q->where('firstname', 'like', '%' . $this->searchStudent . '%')
              ->orWhere('lastname', 'like', '%' . $this->searchStudent . '%');
        });
    })
    ->latest()
    ->paginate(10);

    return view('livewire.admin.author.borrowing-table', compact('borrowings'));
}

public function showDetails($borrowingId)
{
    $this->selectedBorrowing = \App\Models\Borrowing::with('details.book', 'user')->findOrFail($borrowingId);
    $this->showModal = true;
}

}
