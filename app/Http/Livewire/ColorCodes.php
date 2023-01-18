<?php

namespace App\Http\Livewire;

use App\Models\ColorCode;
use Livewire\Component;

class ColorCodes extends Component
{

    public $name, $code, $colorId, $confirming;
    public $next = 1;
    public $page_title = "Add Color";

    public function render()
    {
        $colors = ColorCode::orderBy('id', 'asc')->get();
        return view('livewire.color-codes', compact('colors'));
    }

    public function addColor()
    {
        $this->next();
        $this->resetForm();
        $this->page_title = "Add Color";
    }

    public function resetForm()
    {
        $this->name = "";
        $this->code = "";
        $this->colorId = null;
    }

    public function StoreColor()
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required',


        ]);
        $this->back();
        $colorObj = ColorCode::find($this->colorId);
        if (!$colorObj) {
            $colorObj = new ColorCode();
            $msg = "Color saved successfully.";
        }
        $colorObj->name = $this->name;
        $colorObj->code = $this->code;
        $colorObj->save();
        $msg = "Color Updated successfully.";

        $this->resetForm();
        session()->flash('success',  $msg);
    }

    public function editColor($id)
    {
        $colorObj = ColorCode::find($id);
        $this->name = $colorObj->name;
        $this->code = $colorObj->code;

        $this->colorId = $id;
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

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }
    public function deleteColor($id)
    {
        ColorCode::find($id)->delete();
        session()->flash('success', 'Color deleted successfully.');
    }
}
