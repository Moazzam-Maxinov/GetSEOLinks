@extends('layouts.user.user')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div
            class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:max-w-2xl p-8 border-t-4 border-t-emerald-400">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Change Password</h2>

            <p class="text-sm text-gray-600 mb-6 bg-blue-50 p-3 rounded">
                Note: Password must be at least 8 characters long
            </p>

            @if (session('status'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.update-password') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        New Password
                    </label>
                    <div class="flex gap-2">
                        <div class="relative flex-1">
                            <input type="password" name="password" id="password"
                                class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                            <button type="button" onclick="togglePassword('password')"
                                class="absolute inset-y-0 right-0 px-3 flex items-center">
                                <x-lucide-eye class="w-5 h-5 text-gray-400" id="password-eye" />
                            </button>
                        </div>
                        <button type="button" onclick="generatePassword()"
                            class="p-2 bg-indigo-100 text-indigo-700 rounded hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <x-lucide-wand-2 title="Generate Password" class="w-5 h-5" />
                        </button>
                        <button type="button" onclick="copyPassword()"
                            class="p-2 bg-gray-600 text-white rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            <x-lucide-copy title="Copy Password" class="w-5 h-5" />
                        </button>
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                        Confirm New Password
                    </label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                        <button type="button" onclick="togglePassword('password_confirmation')"
                            class="absolute inset-y-0 right-0 px-3 flex items-center">
                            <x-lucide-eye class="w-5 h-5 text-gray-400" id="confirmation-eye" />
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Change Password
                </button>
            </form>
        </div>
    </div>

    <script>
        function generatePassword() {
            const length = 12;
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
            let password = "";
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charset.length);
                password += charset[randomIndex];
            }

            document.getElementById('password').value = password;
            document.getElementById('password_confirmation').value = password;
        }

        function copyPassword() {
            const password = document.getElementById('password').value;
            navigator.clipboard.writeText(password).then(() => {
                // Flash the copy button background for visual feedback
                const copyButton = document.querySelector('button:has(.lucide-copy)');
                copyButton.classList.add('bg-green-600');
                setTimeout(() => {
                    copyButton.classList.remove('bg-green-600');
                }, 200);
            });
        }

        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const eyeIcon = inputId === 'password' ? document.getElementById('password-eye') : document.getElementById(
                'confirmation-eye');

            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.add('text-indigo-600');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('text-indigo-600');
            }
        }
    </script>
@endsection
