<?php

namespace App\Http\Livewire;

use App\Models\Template;
use Livewire\Component;
use Livewire\WithFileUploads;

class Templates extends Component
{
    use WithFileUploads;
    public $title, $type, $state, $description, $tempId;
    public $next=1;
    public $file;
    public $page_title = "Add Template";

    public function render()
    {

        $templateCollection = Template::orderBy('id','asc')->get();
        return view('livewire.templates',compact('templateCollection'));
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
        $this->state = "";
       $this->tempId = null;
    }

    public function StoreTemplate()
    {
        $this->validate([
            'title' => 'required',
            'type' => 'required',
            'state' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,webp,pdf', // 1MB Max
         ]);
        $this->back();
        $tempObj = Template::find($this->tempId);
        if(!$tempObj){
            $tempObj = new Template();
            $msg="Template saved successfully.";
        }
        $tempObj->title = $this->title;
        $tempObj->type = $this->type;
        $tempObj->state = $this->state;

        $tempObj->save();
        if ($this->file) {
            deleteImage('App\Models\Template', $this->tempId ?? 0, 'templates');
            uploadImage("App\Models\Template", $tempObj->id, $this->file, 'templates');
        }
        $msg="Template Updated successfully.";

        $this->resetForm();
        session()->flash('success', $msg);
    }

    public function editTemplate($id)
    {
        $tempObj = Template::find($id);
        $this->title = $tempObj->title;
        $this->type = $tempObj->type;
        $this->state = $tempObj->state;

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
         deleteImage('App\Models\Template',  $id ?? 0, 'templates');
         Template::find($id)->delete();
         session()->flash('success', 'Template deleted successfully.');
    }

}
