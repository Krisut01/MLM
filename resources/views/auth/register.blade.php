<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            {{-- ⭐ NEW: Sponsor ID Field --}}
            <div>
                <x-label for="sponsor_id" value="{{ __('Sponsor ID (Optional)') }}" />
                <div class="relative">
                    <x-input id="sponsor_id" 
                             class="block mt-1 w-full pr-24" 
                             type="text" 
                             name="sponsor_id" 
                             :value="request('sponsor') ?? old('sponsor_id')" 
                             placeholder="Enter sponsor's user ID" 
                             autocomplete="off" />
                    <span id="sponsorStatus" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-sm"></span>
                </div>
                <p id="sponsorName" class="mt-1 text-sm text-gray-600"></p>
                @error('sponsor_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        {{-- ⭐ JavaScript for Sponsor Lookup --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sponsorInput = document.getElementById('sponsor_id');
                const sponsorStatus = document.getElementById('sponsorStatus');
                const sponsorName = document.getElementById('sponsorName');
                let debounceTimer;

                // Check sponsor on input
                sponsorInput.addEventListener('input', function() {
                    clearTimeout(debounceTimer);
                    const sponsorId = this.value.trim();

                    if (!sponsorId) {
                        sponsorStatus.innerHTML = '';
                        sponsorName.innerHTML = '';
                        return;
                    }

                    sponsorStatus.innerHTML = '<span class="text-gray-400">Checking...</span>';

                    debounceTimer = setTimeout(async () => {
                        try {
                            const response = await fetch(`/api/check-sponsor/${sponsorId}`);
                            const data = await response.json();

                            if (data.valid) {
                                sponsorStatus.innerHTML = '<span class="text-green-600">✓</span>';
                                sponsorName.innerHTML = `Sponsor: <strong>${data.name}</strong>`;
                            } else {
                                sponsorStatus.innerHTML = '<span class="text-red-600">✗</span>';
                                sponsorName.innerHTML = '<span class="text-red-600">Sponsor not found</span>';
                            }
                        } catch (error) {
                            sponsorStatus.innerHTML = '';
                            sponsorName.innerHTML = '';
                        }
                    }, 500);
                });

                // Check initial value if sponsor parameter exists
                if (sponsorInput.value) {
                    sponsorInput.dispatchEvent(new Event('input'));
                }
            });
        </script>
    </x-authentication-card>
</x-guest-layout>
