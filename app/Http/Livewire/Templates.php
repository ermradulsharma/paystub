<?php

namespace App\Http\Livewire;

use App\Models\Template;
use Livewire\Component;
use Livewire\WithFileUploads;

class Templates extends Component
{
    use WithFileUploads;
    public $title, $type, $state, $description, $tempId, $confirming;
    public $next = 1;
    public $file;
    public $page_title = "Add Template";

    public function render()
    {
        $templateCollection = Template::orderBy('id', 'asc')->get();
        return view('livewire.templates', compact('templateCollection'));
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
        $this->file = "";
        $this->type = "";
        $this->state = "";
        $this->tempId = null;
    }

    public function StoreTemplate()
    {
        if ($this->tempId != null) {
            $this->validate([
                'title' => 'required',
                'type' => 'required',
                'state' => 'required'
            ]);
        } else {
            $this->validate([
                'title' => 'required',
                'type' => 'required',
                'state' => 'required',
                'file' => 'required', // 1MB Max
            ]);
        }

        $this->back();
        $tempObj = Template::find($this->tempId);
        if (!$tempObj) {
            $tempObj = new Template();
            $tempObj->title = strtolower(str_replace(' ', '_', $this->title));
            $msg = "Template saved successfully.";
        }
        $tempObj->name = $this->title;

        $tempObj->type = $this->type;
        $tempObj->state = $this->state;

        $tempObj->save();
        if ($this->file) {
            deleteImage('App\Models\Template', $this->tempId ?? 0, 'templates');
            uploadImage("App\Models\Template", $tempObj->id, $this->file, 'templates', $tempObj->title);
        }
        $msg = "Template Updated successfully.";

        $this->resetForm();
        session()->flash('success', $msg);
    }

    public function editTemplate($id)
    {
        $tempObj = Template::find($id);
        $this->title = $tempObj->name;
        $this->type = $tempObj->type;
        $this->state = $tempObj->state;

        $this->tempId = $id;
        $this->next();
        $this->page_title = "Edit Template";
    }

    public function changeStatus($id)
    {
        $tempObj = Template::find($id);
        $tempObj->status = $tempObj->status == 1 ? 2 : 1;
        $tempObj->save();
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
    public function deleteTemplate($id)
    {
        deleteImage('App\Models\Template',  $id ?? 0, 'templates');
        Template::find($id)->delete();
        session()->flash('success', 'Template deleted successfully.');
    }
}
