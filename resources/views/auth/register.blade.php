<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-label for="name" value="{{ __('Full Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <div class="mt-4">
                <x-label for="gender" value="{{ __('gender') }}" />
                <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            
            <div class="mt-4">
                <x-label for="date_of_birth" value="{{ __('date_of_birth') }}" />
                <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required />
            </div>
            
            <div class="mt-4">
                <x-label for="phone" value="{{ __('phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>
            <div class="mt-4">
                <x-label for="address" value="{{ __('address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div>
            <div class="mt-4">
                <x-label for="role" value="{{ __('role') }}" />
                <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="patient" {{ old('role') === 'patient' ? 'selected' : '' }}>Patient</option>
                    <option value="doctor" {{ old('role') === 'doctor' ? 'selected' : '' }}>Doctor</option>
                </select>
            </div>

            <!-- Doctor-specific Fields (only visible if role is doctor) -->
            <div id="doctorFields" style="display: none;">
                <div class="mt-4">
                    <x-label for="specialization" value="{{ __('specialization') }}" />
                    <x-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')" required />
                </div>

                <div class="mt-4">
                    <x-label for="medical_license_number" value="{{ __('medical_license_number') }}" />
                    <x-input id="medical_license_number" class="block mt-1 w-full" type="text" name="medical_license_number" :value="old('medical_license_number')" required />
                </div>
                <div class="mt-4">
                    <x-label for="license_expiry_date" value="{{ __('license_expiry_date') }}" />
                    <x-input id="license_expiry_date" class="block mt-1 w-full" type="date" name="license_expiry_date" :value="old('license_expiry_date')" required />
                </div>
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
    </x-authentication-card>
</x-guest-layout>


<script>
    // Show or hide doctor-specific fields based on selected role
    document.getElementById('role').addEventListener('change', function() {
        // var doctorFields = document.getElementById('doctorFields');
        const role = document.getElementById('role').value;
        const doctorFields = document.getElementById('doctor-fields');

        if (this.value === 'doctor') {
            document.getElementById('doctorFields').style.display = 'block';
        } else {
            document.getElementById('doctorFields').style.display = 'none';
        }
    });

    // Trigger change event on page load in case role is pre-selected
    document.getElementById('role').dispatchEvent(new Event('change'));
</script>


{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Common Fields -->
            <div class="mt-4">
                <x-label for="name" value="{{ __('Full Name') }}" />
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

            <div class="mt-4">
                <x-label for="role" value="{{ __('Role') }}" />
                <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    <option value="" >select Role</option>
                    <option value="patient" {{ old('role') === 'patient' ? 'selected' : '' }}>Patient</option>
                    <option value="doctor" {{ old('role') === 'doctor' ? 'selected' : '' }}>Doctor</option>
                </select>
            </div>

            <!-- Patient-Specific Fields -->
            <div id="patientFields" style="display: none;">
                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Phone') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
                </div>

                <div class="mt-4">
                    <x-label for="address" value="{{ __('Address') }}" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                </div>

                <div class="mt-4">
                    <x-label for="gender" value="{{ __('Gender') }}" />
                    <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                        <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="date_of_birth" value="{{ __('Date of Birth') }}" />
                    <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required />
                </div>
            </div>

            <!-- Doctor-Specific Fields -->
            <div id="doctorFields" style="display: none;">
                <div class="mt-4">
                    <x-label for="specialization" value="{{ __('Specialization') }}" />
                    <x-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" :value="old('specialization')" required />
                </div>

                <div class="mt-4">
                    <x-label for="medical_license_number" value="{{ __('Medical License Number') }}" />
                    <x-input id="medical_license_number" class="block mt-1 w-full" type="text" name="medical_license_number" :value="old('medical_license_number')" required />
                </div>

                <div class="mt-4">
                    <x-label for="license_expiry_date" value="{{ __('License Expiry Date') }}" />
                    <x-input id="license_expiry_date" class="block mt-1 w-full" type="date" name="license_expiry_date" :value="old('license_expiry_date')" required />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    document.getElementById('role').addEventListener('change', function() {
        const role = this.value;
        document.getElementById('patientFields').style.display = role === 'patient' ? 'block' : 'none';
        document.getElementById('doctorFields').style.display = role === 'doctor' ? 'block' : 'none';
    });

    document.getElementById('role').dispatchEvent(new Event('change'));
</script> --}}
