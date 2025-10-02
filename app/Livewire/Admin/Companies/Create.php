<?php

namespace App\Livewire\Admin\Companies;

use Livewire\Component;
use Livewire\WithFileUploads;
use \App\Models\Company;

class Create extends Component
{
    use WithFileUploads;
    public $company;
    public $logo;
    public function rules(){
        return [
            'company.name' => 'required|string|max:255',
            'company.email' => 'required|email|max:255',
            'company.website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 1MB Max
        ];
    }

    public function mount(){
        $this->company = new Company();
    }

    public function save(){
        $this->validate();
        if ($this->logo){
            $this->company->logo = $this->logo->store('logos', 'public');
        }
        $this->company->save();
        session()->flash('success', 'Company created successfully.');
        return $this->redirectIntended(route('companies.index'), true);
    }
    public function render()
    {
        return view('livewire.admin.companies.create');
    }
}
