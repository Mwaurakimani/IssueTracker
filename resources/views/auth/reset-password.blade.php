<x-guest-layout>
    <x-Cards.auth-card>


        <!-- Validation Errors -->
        <x-Errors.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-Element.label for="email" :value="__('Email')" />

                <x-Element.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-Element.label for="password" :value="__('Password')" />

                <x-Element.input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-Element.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-Element.input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-Element.button>
                    {{ __('Reset Password') }}
                </x-Element.button>
            </div>
        </form>
    </x-Cards.auth-card>
</x-guest-layout>
