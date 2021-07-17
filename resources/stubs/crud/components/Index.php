<?php

namespace DummyComponentNamespace;

use DummyModelNamespace\DummyModelClass;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $sort = 'Name';
    public $sorts = ['Name', 'Newest', 'Oldest'];
    public $filter = 'All';
    public $filters = ['All', 'First 100'];

    protected $listeners = ['$refresh'];

    public function route()
    {
        return Route::get('dummy-route-uri', static::class)
            ->name('dummy.prefix')
            ->middleware('auth');
    }

    public function render()
    {
        return view('dummy.prefix.index', [
            'dummyModelVariables' => $this->query()->paginate(),
        ]);
    }

    public function query()
    {
        $query = DummyModelClass::query();

        if ($this->search) {
            $query->where(function (Builder $query) {
                $query->where('id', 'like', '%' . $this->search . '%');
                $query->orWhere('name', 'like', '%' . $this->search . '%');
            });
        }

        switch ($this->sort) {
            case 'Name': $query->orderBy('name'); break;
            case 'Newest': $query->orderByDesc('created_at'); break;
            case 'Oldest': $query->orderBy('created_at'); break;
        }

        switch ($this->filter) {
            case 'All': break;
            case 'First 100': $query->where('id', '<=', 100); break;
        }

        return $query;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(DummyModelClass $dummyModelVariable)
    {
        $dummyModelVariable->delete();

        $this->emit('showToast', 'success', __('Dummy Model Title deleted!'));
    }
}
