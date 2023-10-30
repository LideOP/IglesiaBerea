 
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.registrar') }}">
            @csrf

  
            <div> 
                <x-label for="name" value="{{ __('nombre') }}" />
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div> 
                <x-label for="apellido" value="{{ __('apellidos') }}" />
                <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
            </div>

            <div class="mt-4">
                <x-label for="ci" value="{{ __('ci') }}" />
                <x-input id="ci" class="block mt-1 w-full" type="number" name="ci" :value="old('ci')" required autocomplete="ci" />
            </div>

            <div class="mt-4">
                <x-label for="telefono" value="{{ __('telefono') }}" />
                <x-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" :value="old('telefono')" required autocomplete="telefono" />
            </div>

            <div class="mt-4">
                <x-label for="ffnn" value="{{ __('Fecha Nacimiento') }}" />
                <x-input id="fecha_nac" class="block mt-1 w-full" type="date" name="fecha_nac" :value="old('ffnn')" required autocomplete="ffnn" />
            </div>

            <div class="mt-4">
                <x-label for="direccion" value="{{ __('direccion') }}" />
                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" required autocomplete="direccion" />
            </div>


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
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

                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
