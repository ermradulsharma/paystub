<?php

namespace App\Http\Livewire;

use App\Models\Deduction;
use Livewire\Component;

class Deductions extends Component
{
   
    public $title,$price, $deductionId; 
    public $next=1;
    public $page_title = "Add Deduction";

    public function render()
    {
        $deductions = Deduction::orderBy('id','asc')->get();
        return view('livewire.deductions',compact('deductions'));
    }

    public function addDeduction()
    {
            $this->next();
            $this->resetForm();
            $this->page_title = "Add Deduction";
       
    }

    public function resetForm()
    {
        $this->title = "";
        $this->price = "";
        $this->deductionId = null;
    }

    public function StoreDeduction()
    {
        $this->validate([
            'title' => 'required',
            'price' => 'required',
        

        ]);
        $this->back();
        $deductionObj = Deduction::find($this->deductionId);
        if(!$deductionObj){
            $deductionObj = new Deduction();
        }
        $deductionObj->title = $this->title;
        $deductionObj->price = $this->price;
        $deductionObj->save();
        $this->resetForm();
        session()->flash('success', 'Deduction save successfully.');
    }

    public function editDeduction($id)
    {
        $deductionObj = Deduction::find($id);
        $this->title = $deductionObj->title;
        $this->price = $deductionObj->price;
        
        $this->deductionId = $id;
        $this->next();
        $this->page_title = "Edit Deduction";
    }

    public function next()
    {
        $this->next++;
    }

    public function back()
    {
        $this->next--;
    }

    public function deleteDeduction($id)
    {
        Deduction::find($id)->delete();
        session()->flash('success', 'Deduction delete successfully.');
    }
}
