<?php

namespace App\Livewire\Pages\Users;

use App\Models\People;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'created_at';
    public $direction = 'desc';
    public $status = null;
    public $error = '';
    public $checked = [];
    public $modelIds = [];
    public $selectAllState = false;
    public $options = [];
    public $opt;
    public $optPhrase = '';
    public $optFilter = [];
    public $optOpen = false;

    protected $queryString = ['sort','direction','status','search'];

    public function sortBy($field)
    {
        if($this->sort == $field){
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->direction = 'asc';
        }

        $this->sort = $field;
    }

    public function selectAll()
    {
        if($this->selectAllState){
            $this->checked = $this->modelIds;
        } else {
            $this->checked = [];
        }
    }

    public function checkItem()
    {
        if(count($this->checked) < count($this->modelIds)){
            $this->selectAllState = false;
        } else {
            $this->selectAllState = true;
        }
    }

    public function resetChecked()
    {
        $this->selectAllState = false;
        $this->checked = [];
    }

    public function updatingPage($page)
    {
        $this->resetChecked();
    }

    public function mount()
    {
        $this->options = [
            ['id' => null, 'text' => '---'],
            ['id' => 0, 'text' => 'no', 'icon' => 'fa-solid fa-ban'],
            ['id' => 1, 'text' => 'yes', 'icon' => 'fa fa-check'],
            [
                'id' => 2,
                'text' => 'Меблі',
                'children' => [
                    ['id' => 3, 'text' => 'Стульчики які дуже довгий текст'],
                    ['id' => 4, 'text' => 'Крісла'],
                    ['id' => 5, 'text' => 'Дивани'],
                    [
                        'id' => 6,
                        'text' => 'Столи',
                        'children' => [
                            ['id' => 7, 'text' => 'Овальні'],
                            ['id' => 8, 'text' => 'Круглі'],
                        ]
                    ],
                ]
            ],
        ];
    }

    /**
     *  Livewire Lifecycle Hook
     */
    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    /**
     *  Livewire Lifecycle Hook
     */
    public function updatingStatus(): void
    {
        $this->gotoPage(1);
    }


    public function mySearch()
    {
        $this->optFilter = [];
        if(mb_strlen($this->optPhrase) > 1){
            $users = User::query()->where('name','like','%' . $this->optPhrase . '%')->orderBy('name')->get();

            if($users){
                foreach ($users as $user){
                    $this->optFilter[] = [
                        'id' => $user->id,
                        'text' => $user->name,
                    ];
                }
            }
        } else {
            $this->optFilter = [];
        }
    }

    public function updatedOpt()
    {
        $this->optFilter = array_filter($this->optFilter, function ($option) {
            return $option['id'] == $this->opt;
        });
        $this->optPhrase = '';
    }

    public function optOpenToggle()
    {
        $this->optOpen = !$this->optOpen;
    }

    public function optOpenClose()
    {
        $this->optOpen = false;
    }

    public function render()
    {
        $query = User::query();

        if($this->search !== ''){
            $query->where("name","like","%" . $this->search . "%");
        }

        if(in_array($this->status,["0","1"])){
            $query->where("status",$this->status);
        }

        $model = $query
            ->orderBy($this->sort,$this->direction)
            ->paginate(5);

        $this->modelIds = $model->pluck('id')->toArray();

//        if(!count( $model)){
//            $this->error = 'Немає записів';
//        } else {
//            $this->error = '';
//        }

        $breadcrumb = [
            [
                'title' => 'Користувачі'
            ]
        ];

        return view('livewire.pages.users.index', compact('model','breadcrumb'))
            ->layout('layouts.app');
    }
}
