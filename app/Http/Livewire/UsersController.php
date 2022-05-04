<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersController extends Component
{
    public function render()
    {
        return view('livewire.users.component')
        ->extends('layouts.theme.app')
        ->section('content');
    }
}