<form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf

    {{-- Name --}}
    <div class="fromGroup">
        <label for="name" class="block capitalize form-label">
            {{ __('Name') }}
        </label>
        <div class="relative">
            <input type="text" name="name" id="name"
                class="form-control py-2 @error('name') !border !border-red-500 @enderror"
                placeholder="{{ __('Enter your full name') }}" required autofocus value="{{ old('name') }}">
                <span class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center dark:text-white">
                    <iconify-icon icon="heroicons-outline:user"></iconify-icon>
                </span>
        </div>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    {{-- Email --}}
    <div class="fromGroup">
        <label for="email" class="block capitalize form-label">
            {{ __('Email') }}
        </label>
        <div class="relative">
            <input type="email" name="email" id="email"
                class="form-control py-2 @error('email') !border !border-red-500 @enderror"
                placeholder="{{ __('Enter your email') }}" required value="{{ old('email') }}">
                <span class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center dark:text-white">
                    <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
                </span>
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    {{-- Password --}}
    <div class="fromGroup">
        <label for="password" class="block capitalize form-label">
            {{ __('Password') }}
        </label>
        <div class="relative" id="passwordInputField">
            <input type="password" name="password" id="password"
                class="form-control py-2 passwordfield @error('password') !border !border-red-500 @enderror"
                placeholder="{{ __('Enter your password') }}" required autocomplete="new-password">
                <span class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center cursor-pointer dark:text-white" id="toggleIcon">
                    <iconify-icon id="hidePassword" icon="heroicons-outline:eye-off"></iconify-icon>
                    <iconify-icon class="hidden" id="showPassword" icon="heroicons-outline:eye"></iconify-icon>
                </span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
    </div>

    {{-- Confirm Password --}}
    <div class="fromGroup">
        <label for="password_confirmation" class="block capitalize form-label">
            {{ __('Confirm Password') }}
        </label>
        <div class="relative" id="passwordInputField">
            <input type="password" name="password_confirmation"
                id="password_confirmation"
                class="form-control py-2 passwordfield @error('password_confirmation') !border !border-red-500 @enderror"
                placeholder="{{ __('Enter your confirm password') }}" required autocomplete="password_confirmation">
                <span class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center cursor-pointer dark:text-white" id="toggleIcon">
                    <iconify-icon id="hidePassword" icon="heroicons-outline:eye-off"></iconify-icon>
                    <iconify-icon class="hidden" id="showPassword" icon="heroicons-outline:eye"></iconify-icon>
                </span>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
    </div>

    {{-- Terms & Condition Checkbox --}}
    <div class="flex justify-between">
        <div class="checkbox-area">
            <label class="inline-flex items-center cursor-pointer" for="checkbox">
                <input type="checkbox" class="hidden" name="terms" id="checkbox" required>
                <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                    <img src="/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>
                <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">{{ __('Accept our TOS and Privacy Policy') }}</span>
            </label>
        </div>
        <x-input-error :messages="$errors->get('terms')" class="mt-2" />
    </div>

    <button type="submit" class="btn inline-flex justify-center btn-dark items-center w-full text-center">
        <iconify-icon icon="solar:user-plus-bold-duotone" class="ltr:mr-2 rtl:ml-2"></iconify-icon> 
        <span>{{ __('Create an account') }}</span>
    </button>
</form>
