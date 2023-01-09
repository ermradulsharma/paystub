<?php

namespace App\Http\Livewire;

use App\Models\Template;
use Livewire\Component;

class Templates extends Component
{
  
    public $name, $tempId; 
    public $next=1;
    public $page_title = "Add Template";

    public function render()
    {

        $templatecollection = Template::orderBy('id','asc')->get();
        return view('livewire.templates',compact('templatecollection'));
    }

    public function addTemplate()
    {
            $this->next();
            $this->resetForm();
            $this->page_title = "Add Template";
       
    }

    public function resetForm()
    {
        $this->name = "";
        $this->tempId = null;
    }

    public function StoreTemplate()
    {
        $this->validate([
            'name' => 'required',
        

        ]);
        $this->back();
        $tempObj = Template::find($this->tempId);
        if(!$tempObj){
            $tempObj = new Template();
        }
        $tempObj->name = $this->name;
        $tempObj->save();
        $this->resetForm();
        session()->flash('success', 'template save successfully.');
    }

    public function editTemplate($id)
    {
        $tempObj = Template::find($id);
        $this->name = $tempObj->name;
        
        $this->tempId = $id;
        $this->next();
        $this->page_title = "Edit Template";
    }

    public function next()
    {
        $this->next++;
    }

    public function back()
    {
        $this->next--;
    }

    public function deleteTemplate($id)
    {
        Template::find($id)->delete();
        session()->flash('success', 'Template delete successfully.');
    }

}
