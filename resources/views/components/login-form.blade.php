<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf
    {{-- Email --}}
    <div class="fromGroup">
        <label for="email" class="block capitalize form-label">{{ __('Email') }}</label>
        <div class="relative ">
            <input type="email" name="email" id="email"
                class="form-control py-2 @error('email') !border !border-red-500 @enderror"
                placeholder="{{ __('Enter your email account') }}" autofocus
                value="{{ old('email') }}">
            <span class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center dark:text-white">
                <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
            </span>
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
    </div>

    {{-- Password --}}
    <div class="fromGroup">
        <label for="password" class="block capitalize form-label">{{ __('Password') }}</label>
        <div class="relative" id="passwordInputField">
            <input type="password" name="password" class="form-control py-2 passwordfield @error('password') !border !border-red-500 @enderror" placeholder="{{ __('Enter your password account') }}" id="password" autocomplete="current-password">
            <span class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center cursor-pointer dark:text-white" id="toggleIcon">
                <iconify-icon id="hidePassword" icon="heroicons-outline:eye-off"></iconify-icon>
                <iconify-icon class="hidden" id="showPassword" icon="heroicons-outline:eye"></iconify-icon>
            </span>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
    </div>


    {{-- Remember Me checkbox --}}
    <div class="flex justify-between">
        <div class="checkbox-area">
            <label class="inline-flex items-center cursor-pointer" for="remember_me">
                <input type="checkbox" class="hidden" name="remember" id="remember_me">
                <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                    <img src="images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>
                <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">{{ __('Remember me') }}</span>
            </label>
        </div>
        <a href="{{ route('password.request') }}" class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium">
            {{ __('Forgot your password?') }}
        </a>
    </div>

    <button type="submit" class="btn inline-flex justify-center btn-dark items-center w-full text-center">
        <iconify-icon class="ltr:mr-2 rtl:ml-2" icon="solar:login-3-bold-duotone"></iconify-icon>
        <span>{{ __('Log In') }}</span>
    </button>

</form>
