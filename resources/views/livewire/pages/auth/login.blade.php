<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>
    <h4 class="text-center mb-4" style="color: #469EDE; font-weight: 600;">Admin Login</h4>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-3" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit="login">
        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input wire:model="form.email" id="email" class="form-control" type="email" name="email" required autofocus autocomplete="username">
            @error('form.email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input wire:model="form.password" id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
            @error('form.password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input wire:model="form.remember" id="remember" type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label" for="remember">
                Remember me
            </label>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" style="background-color: #469EDE; border-color: #469EDE;">
                Log in
            </button>
        </div>

        @if (Route::has('password.request'))
            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}" class="text-decoration-none small" style="color: #469EDE;" wire:navigate>
                    Forgot your password?
                </a>
            </div>
        @endif
    </form>
</div>
