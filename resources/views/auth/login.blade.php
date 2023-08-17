<x-guest-layout>
    <div class="auth-box h-full flex flex-col justify-center">
        <div class="mobile-logo text-center mb-6 lg:hidden flex justify-center">
            <div class="mb-10 inline-flex items-center justify-center">
                <x-application-logo />
                <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">SiTani</span>
            </div>
        </div>
        <div class="text-center 2xl:mb-10 mb-4">
            <h4 class="font-medium"> {{ __('Agricultural Information System') }}</h4>
            <div class="text-slate-500 text-base">
                {{ __('Please enter your email and password.') }}
            </div>
        </div>

        <!-- START::LOGIN FORM -->
        <x-login-form></x-login-form>
        <!-- END::LOGIN FORM -->

        <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-8 uppercase text-sm text-center">
            {{ __('Don\'t have an account?') }}
            <a href="{{ route('register') }}" class="text-slate-900 dark:text-white font-medium">
                {{ __('Sign Up') }}
            </a>
        </div>
    </div>
</x-guest-layout>