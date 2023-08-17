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
                    {{--Create owner form start--}}
                    <form method="POST" action="{{ route('owners.store') }}"  class="space-y-4">
                        @csrf
                        <div class="bg-white dark:bg-slate-800 pb-6">
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-1">
                                {{--Name input end--}}
                                <div class="formGroup">
                                    <label for="name" class="form-label">{{ __('Name Owner') }}</label>
                                    <div class="input-area relative">
                                        <input name="name" type="text" id="name" class="form-control !pl-12"
                                            placeholder="{{ __('Enter name owner') }}" value="{{ old('name') }}" required>
                                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                                <iconify-icon icon="heroicons-outline:user"></iconify-icon>
                                            </span>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Name input end--}}

                                {{--Phone input start--}}
                                <div class="formGroup">
                                    <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                                    <div class="input-area relative">
                                        <input name="phone" type="tel" id="phone" class="form-control !pl-12"
                                            placeholder="{{ __('Enter phone number owner') }}" value="{{ old('phone') }}" required>
                                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                                <iconify-icon icon="heroicons:phone-arrow-up-right"></iconify-icon>
                                            </span>
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Phone input end--}}

                                {{--Address input start--}}
                                <div class="formGroup">
                                    <label for="address" class="form-label">{{ __('Address Owner') }}</label>
                                    <div class="input-area relative">
                                        <input name="address" type="text" id="address" class="form-control !pl-12" placeholder="{{ __('Enter Address Owner') }}" >
                                        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                            <iconify-icon icon="mdi:address-marker"></iconify-icon>
                                        </span>
                                        <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Address input end--}}
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
