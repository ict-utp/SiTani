<x-guest-layout>
    <div class="auth-box flex flex-col justify-center h-full">
        <div class="mobile-logo text-center mb-6 lg:hidden flex justify-center">
            <div class="mb-10 inline-flex items-center justify-center">
                <x-application-logo />
                <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">SiTani</span>
            </div>
        </div>
        <div class="w-full px-4 sms:px-0 sm:w-[480px]">
            <div class="text-center">
                <h4 class="font-medium">
                    {{ __('Agricultural Information System') }}
                </h4>
                <p class="text-slate-500 dark:text-slate-400 text-base">
                    {{ __('Enter your email and instructions will be sent to you!') }}
                </p>
            </div>
            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                {{-- Email --}}
                <div class="mt-3 formGroup mb-3">
                    <label for="email" class="block capitalize form-label">
                        {{ __('Email') }}
                    </label>
                    <div class="relative">
                        <input type="email" name="email" id="email" class="form-control py-2 " placeholder="{{ __('Enter your email account') }}" required value="{{ old('email') }}">
                        <span class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center dark:text-white">
                            <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
                        </span>
                    </div>
                    
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <button type="submit" class="btn inline-flex justify-center btn-dark items-center w-full text-center">
                    <iconify-icon icon="mingcute:send-fill" class="ltr:mr-2 rtl:ml-2"></iconify-icon> 
                    <span>{{ __('Send recovery email') }}</span>
                </button>
            </form>
            <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-8 uppercase text-sm text-center">
                {{ __('Remember your password?') }}
                <a href="{{ route('login') }}" class="text-slate-900 dark:text-white font-medium">
                    {{ __('Sign In') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>