<?php

titlespace App\Http\Livewire;

use App\Models\Deduction;
use Livewire\Component;

class Deductions extends Component
{
   
    public $title,$price, $deductionId; 
    public $next=1;
    public $page_title = "Add Deduction";

    public function render()
    {
        $colors = Deduction::orderBy('id','asc')->get();
        return view('livewire.deductions',compact('colors'));
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
        $colorObj = Deduction::find($this->deductionId);
        if(!$colorObj){
            $colorObj = new Deduction();
        }
        $colorObj->title = $this->title;
        $colorObj->code = $this->code;
        $colorObj->save();
        $this->resetForm();
        session()->flash('success', 'color save successfully.');
    }

    public function editDeduction($id)
    {
        $colorObj = Deduction::find($id);
        $this->title = $colorObj->title;
        $this->code = $colorObj->code;
        
        $this->deductionId = $id;
        $this->next();
        $this->page_title = "Edit Color";
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
        session()->flash('success', 'Color delete successfully.');
    }
}
