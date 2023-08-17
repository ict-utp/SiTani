<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{--Breadcrumb end--}}

        <div class="card">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    {{--Create user form start--}}
                    <form method="POST" action="{{ route('users.store') }}"  class="space-y-4">
                        @csrf
                        <div class="bg-white dark:bg-slate-800 pb-6">
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-1">
                                {{--Name input end--}}
                                <div class="formGroup">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <div class="input-area relative">
                                        <input name="name" type="text" id="name" class="form-control !pl-12"
                                            placeholder="{{ __('Enter your name') }}" value="{{ old('name') }}" required>
                                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                                <iconify-icon icon="heroicons-outline:user"></iconify-icon>
                                            </span>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                    </div>
                                </div>

                                {{--Email input start--}}
                                <div class="formGroup">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <div class="input-area  relative">
                                        <input name="email" type="email" id="email" class="form-control !pl-12"
                                            placeholder="{{ __('Enter your email') }}" value="{{ old('email') }}" required>
                                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                                <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
                                            </span>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Email input end--}}

                                {{--password input start--}}
                                <div class="formGroup">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <div class="input-area relative">
                                        <input name="password" type="password" id="password" class="form-control !pl-12" placeholder="{{ __('Enter Password') }}" >
                                        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                            <iconify-icon icon="heroicons-outline:lock-closed"></iconify-icon>
                                        </span>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Password input end--}}

                                {{--Role input start--}}
                                <div class="formGroup">
                                    <label for="role" class="form-label">{{ __('Role') }}</label>
                                    <div class="input-area relative">
                                        <select name="role" class="form-control !pl-12">
                                            <option value="" selected disabled>
                                                {{ __('Select Role') }}
                                            </option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                            <iconify-icon icon="eos-icons:role-binding-outlined"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                {{--Role input end--}}
                            </div>
                            <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                                {{ __('Save') }}
                            </button>
                        </div>

                    </form>
                    {{--Create user form end--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
