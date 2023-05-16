<x-guest-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full"
                 src="{{ asset('images/login-office.jpeg') }}"
                 alt="Office"/>
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Login
                </h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Input[ype="email"] -->
                    <div class="mt-4">
                        <x-input-label :value="__('Email')"/>
                        <x-text-input
                            type="email"
                                 id="email"
                                 name="email"
                                 value="{{ old('email') }}"
                                 class="block w-full"
                            placeholder="Email"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Input[ype="password"] -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')"/>
                        <x-text-input type="password"
                                 id="password"
                                 placeholder="password"
                                 name="password"
                                 class="block w-full"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center dark:text-gray-400">
                            <input type="checkbox"
                                   name="remember"
                                   class="h-[18px] w-[18px] rounded border-slate-200 text-purple-500 shadow-sm ring-offset-0 checked:text-purple-500 focus:shadow-none focus:outline-none focus:ring-0 focus:ring-offset-0 dark:border-slate-600/50 dark:bg-slate-900">
                            <span class="ml-2 select-none text-sm tracking-tight text-slate-600 dark:text-slate-200">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mt-4">
                        <x-primary-button class="block w-full">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <hr class="my-8"/>

                @if (Route::has('password.request'))
                    <p class="mt-4 flex items-center justify-between">
                        <a class="text-sm font-medium text-primary-600 hover:underline"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        <a class="text-sm font-medium text-primary-600 hover:underline"
                           href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
