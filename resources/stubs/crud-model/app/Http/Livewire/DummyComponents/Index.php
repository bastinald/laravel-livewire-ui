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
    public $filters = ['All', 'Custom'];
    protected $listeners = ['$refresh'];

    public function route()
    {
        return Route::get('/dummy-route-uri', static::class)
            ->name('dummy-route-name')
            ->middleware('auth');
    }

    public function render()
    {
        return view('dummy-views.index', [
            'dummyModelVariables' => $this->query()->paginate(),
        ]);
    }

    public function query()
    {
        $query = DummyModelClass::query();

        if ($this->search) {
            $query->where(function (Builder $query) {
                $query->orWhere('id', 'like', '%' . $this->search . '%');
                $query->orWhere('name', 'like', '%' . $this->search . '%');
            });
        }

        switch ($this->sort) {
            case 'Name': $query->orderBy('name'); break;
            case 'Newest': $query->orderByDesc('created_at'); break;
            case 'Oldest': $query->orderBy('created_at'); break;
        }

        switch ($this->filter) {
            case 'Custom': $query->whereNull('id'); break;
        }

        return $query;
    }

    public function delete(DummyModelClass $dummyModelVariable)
    {
        $dummyModelVariable->delete();
    }
}
