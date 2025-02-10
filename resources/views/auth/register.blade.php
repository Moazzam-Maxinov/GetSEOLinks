<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="register-form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                value="{{ request()->query('email', old('email')) }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Replace the reCAPTCHA script with this updated version -->
    {{-- <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
                    action: 'register'
                }).then(function(token) {
                    // Add the token to your form
                    let tokenInput = document.querySelector('input[name="g-recaptcha-response"]');
                    if (!tokenInput) {
                        tokenInput = document.createElement('input');
                        tokenInput.type = 'hidden';
                        tokenInput.name = 'g-recaptcha-response';
                        document.querySelector('form').appendChild(tokenInput);
                    }
                    tokenInput.value = token;
                    document.querySelector('form').submit();
                });
            });
        });
    </script> --}}

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
    <script>
        document.getElementById('register-form').addEventListener('submit', function(e) {
            e.preventDefault();

            grecaptcha.ready(function() {
                grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
                        action: 'register'
                    })
                    .then(function(token) {
                        let tokenInput = document.querySelector('input[name="g-recaptcha-response"]');
                        if (!tokenInput) {
                            tokenInput = document.createElement('input');
                            tokenInput.type = 'hidden';
                            tokenInput.name = 'g-recaptcha-response';
                            document.getElementById('register-form').appendChild(tokenInput);
                        }
                        tokenInput.value = token;

                        document.getElementById('register-form').submit();
                    })
                    .catch(function(error) {
                        console.error('reCAPTCHA error:', error);
                    });
            });
        });
    </script>

</x-guest-layout>
