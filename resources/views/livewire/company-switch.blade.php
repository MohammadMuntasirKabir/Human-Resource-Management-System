<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\URL;

new class extends Component {
    public $company;

    public function mount($company)
    {
        $this->company = $company;
    }

    public function selectCompany($id)
    {
        session(['company_id' => $this->company->id]);
        $this->redirectIntended(URL::previous(), true);
    }
}; ?>

<div>
    <flux:menu.item wire:click="selectCompany({{ $company->id }})">
        {{ $company->name }}
    </flux:menu.item>
</div>
