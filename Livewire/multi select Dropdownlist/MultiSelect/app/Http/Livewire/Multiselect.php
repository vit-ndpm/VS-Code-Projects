<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use App\Models\officers;

class Multiselect extends Component
{
    public $members=[];
    public $list;
    public $name;
    protected $rules=[
        'name'=>'required',
        'members'=>'required',
    ];
    public function render()
    {
        $officers=officers::all();
        return view('livewire.multiselect',compact('officers'));
    }
   public function updatedmembers($value){
    //dd($value);
    }
    function saveData()  {
        $data=$this->validate();
        $data['members']=implode(',',$this->members);
        
        Member::create($data);
        
        
    }
    function mount()  {
        $this->list=Member::all();
        
    }

    

    
}
