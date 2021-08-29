<?php

namespace DummyComponentNamespace;

use Bastinald\LaravelBootstrapComponents\Traits\WithModel;
use DummyModelNamespace\DummyModelClass;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithModel, WithPagination;

    public $sort = 'Name';
    public $sorts = ['Name', 'Newest', 'Oldest'];
    public $filter = 'All';
    public $filters = ['All', 'First 100'];
    protected $listeners = ['$refresh'];

    public function route()
    {
        return Route::get('dummy-route-uri')
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

        if ($search = $this->model()->get('search')) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%');
                $query->orWhere('name', 'like', '%' . $search . '%');
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

    public function delete(DummyModelClass $dummyModelVariable)
    {
        $dummyModelVariable->delete();

        $this->emit('showToast', 'success', __('Dummy Model Title deleted!'));
    }
}
