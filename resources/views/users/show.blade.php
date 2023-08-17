<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{--Breadcrumb end--}}

        <div class="card">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    <div class="space-y-4">
                        {{--Name input start--}}
                        <div class="formGroup">
                            <label for="name" class="font-Inter font-medium text-sm text-textColor dark:text-white pb-2 inline-block">
                                {{ __('Name') }}
                            </label>
                            <div class="input-area relative">
                                <input name="name" type="text" id="name" class="p-3 py-2 !pl-12 rounded bg-slate-200 dark:bg-slate-900 dark:text-slate-300 w-full cursor-not-allowed"
                                        placeholder="{{ __('Enter your name') }}" value="{{ $user->name }}" disabled>
                                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                    <iconify-icon icon="heroicons-outline:user"></iconify-icon>
                                </span>
                            </div>
                        </div>
                        {{--Name input end--}}

                        {{--Email input start--}}
                        <div class="formGroup">
                            <label for="email" class="font-Inter font-medium text-sm text-textColor dark:text-white pb-2 inline-block">
                                {{ __('Email') }}
                            </label>
                            <div class="input-group relative">
                                <input name="email" type="email" id="email" class="p-3 py-2 !pl-12 rounded bg-slate-200 dark:bg-slate-900 dark:text-slate-300 w-full cursor-not-allowed"
                                    placeholder="{{ __('Enter your email') }}" value="{{ $user->email }}" required disabled>
                                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                    <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
                                </span>
                            </div>
                        </div>
                        {{--Email input end--}}

                        {{--Phone input start--}}
                        <div class="formGroup">
                            <label for="phone" class="font-Inter font-medium text-sm text-textColor dark:text-white pb-2 inline-block">
                                {{ __('Phone Number') }}
                            </label>
                            <div class="input-area relative">
                                <input name="phone" type="number" id="phone" class="p-3 py-2 !pl-12 rounded bg-slate-200 dark:bg-slate-900 dark:text-slate-300 w-full cursor-not-allowed"
                                        placeholder="{{ $user->phone ?: 'N/A' }}" disabled>
                                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                    <iconify-icon icon="heroicons:phone-arrow-up-right"></iconify-icon>
                                </span>
                            </div>
                        </div>
                        {{--Phone input end--}}
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
