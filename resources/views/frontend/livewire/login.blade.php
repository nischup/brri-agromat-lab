<form class="login-form" method="POST" {{ route('login') }}>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('error'))
            <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label" for="inputEmail">Email / Phone</label>
        <input type="text" class="form-control" wire:model.defer="login" id="login" placeholder="{{ __('Email/Phone') }}">
        @error('login') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

        <div class="mb-3">
            <label class="form-label" for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" wire:model.defer="password" id="password" placeholder="{{ __('Password') }}">
                 @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>

{{--     @if (Route::has('password.request'))
        <div class="form-control">
            <a href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
        </div>
    @endif --}}

    <button type="submit" class="btn btn-primary" wire:click.prevent="authenticate">Log in</button>

</form>

