<?php

namespace App\Http\Livewire;

use App\Models\Template;
use Livewire\Component;
use Livewire\WithFileUploads;

class Templates extends Component
{
    use WithFileUploads;
    public $title, $type, $discription, $tempId; 
    public $next=1;
    public $file;
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
        $this->title = "";
        $this->type = "";
        $this->discription = "";
        $this->tempId = null;
    }

    public function StoreTemplate()
    {
        $this->validate([
            'title' => 'required',
            'type' => 'required',
            'discription' => 'required',
            'file' => 'image|max:1024|mimes:png,jpg,jpeg,webp', // 1MB Max
         ]);
        $this->back();
        $tempObj = Template::find($this->tempId);
        if(!$tempObj){
            $tempObj = new Template();
        }
        $tempObj->title = $this->title;
        $tempObj->type = $this->type;
        $tempObj->discription = $this->discription;
       
        $tempObj->save();
        if ($this->file) {
            deleteImage('App\Models\Template', $this->tempId ?? 0, 'templates');
            uploadImage("App\Models\Template", $tempObj->id, $this->file, 'templates');
        }
        $this->resetForm();
        session()->flash('success', 'template save successfully.');
    }

    public function editTemplate($id)
    {
        $tempObj = Template::find($id);
        $this->title = $tempObj->title;
        $this->type = $tempObj->type;
        $this->discription = $tempObj->discription;
        
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
         $tempdelete= Template::find($id);
         deleteImage('App\Models\Template',  $tempdelete->id ?? 0, 'templates');

         $tempdelete->delete();
         session()->flash('success', 'Template delete successfully.');
    }

}
