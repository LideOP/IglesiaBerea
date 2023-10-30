<?php

namespace App\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\expositor;

class ExpositorAutocomplete extends Component

    {
        public $search = '';
        public $results = [];
    
        public function updatedSearch()
        {
            dd($this->search);
            $this->results = expositor::where('nombre', 'like', '%' . $this->search . '%')->get();
        }
        public function render()
        {
            return view('livewire.expositor-autocomplete')->layout('layouts.app');
        }
    }

