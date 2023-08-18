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
                    {{--Create product form start--}}
                    <form method="POST" action="{{ route('products.store') }}" class="space-y-4">
                        @csrf
                        <div class="bg-white dark:bg-slate-800 pb-6">
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-1">
                                {{--Title input end--}}
                                <div class="formGroup">
                                    <label for="title" class="form-label">{{ __('Title Product') }}</label>
                                    <div class="input-area relative">
                                        <input name="title" type="text" id="title" class="form-control !pl-12"
                                            placeholder="{{ __('Enter title product') }}" value="{{ old('title') }}" required>
                                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                                <iconify-icon icon="fluent-mdl2:product"></iconify-icon>
                                            </span>
                                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Title  input end--}}

                                {{--Quantity input end--}}
                                <div class="formGroup">
                                    <label for="quantity" class="form-label">{{ __('Quantity Product') }}</label>
                                    <div class="input-area relative">
                                        <input name="quantity" type="text" id="quantity" class="form-control !pl-12"
                                            placeholder="{{ __('Enter quantity product') }}" value="{{ old('quantity') }}" required>
                                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                                <iconify-icon icon="fluent-mdl2:product"></iconify-icon>
                                            </span>
                                        <x-input-error :messages="$errors->get('quantity')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Quantity input end--}}

                                {{--Period input end--}}
                                <div class="formGroup">
                                    <label for="period" class="form-label">{{ __('Period Product') }}</label>
                                    <div class="input-area relative">
                                        <input name="period" type="text" id="period" class="form-control !pl-12"
                                            placeholder="{{ __('Enter period product') }}" value="{{ old('period') }}">
                                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                                <iconify-icon icon="fluent-mdl2:product"></iconify-icon>
                                            </span>
                                        <x-input-error :messages="$errors->get('period')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Period input end--}}

                                {{--Address input end--}}
                                <div class="formGroup">
                                    <label for="address" class="form-label">{{ __('Address Product') }}</label>
                                    <div class="input-area relative">
                                        <input name="address" type="text" id="address" class="form-control !pl-12"
                                            placeholder="{{ __('Enter address product') }}" value="{{ old('address') }}" required>
                                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                                <iconify-icon icon="fluent-mdl2:product"></iconify-icon>
                                            </span>
                                        <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Address input end--}}

                                {{--Description input end--}}
                                <div class="formGroup">
                                    <label for="description" class="form-label">{{ __('Description Product') }}</label>
                                    <div class="input-area relative">
                                        <input name="description" type="text" id="description" class="form-control !pl-12"
                                            placeholder="{{ __('Enter description product') }}" value="{{ old('description') }}" required>
                                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                                <iconify-icon icon="fluent-mdl2:product"></iconify-icon>
                                            </span>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                    </div>
                                </div>
                                {{--Description input end--}}

                                {{--Product Categories input start--}}
                                <div class="formGroup">
                                    <label for="product_categories_id" class="form-label">{{ __('Categories Product') }}</label>
                                    <div class="input-area relative">
                                        <select name="product_categories_id" class="form-control !pl-12">
                                            <option value="" selected disabled>
                                                {{ __('Select Categories Product') }}
                                            </option>
                                            @foreach($productCategories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                            <iconify-icon icon="eos-icons:role-binding-outlined"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                {{--Product Categories input end--}}

                                {{--Product Type input start--}}
                                <div class="formGroup">
                                    <label for="product_type_id" class="form-label">{{ __('Types Product') }}</label>
                                    <div class="input-area relative">
                                        <select name="product_type_id" class="form-control !pl-12">
                                            <option value="" selected disabled>
                                                {{ __('Select Types Product') }}
                                            </option>
                                            @foreach($productTypes as $type)
                                                <option value="{{ $type->id }}">
                                                    {{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                            <iconify-icon icon="eos-icons:role-binding-outlined"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                {{--Product Type input end--}}

                                {{--Owner input start--}}
                                <div class="formGroup">
                                    <label for="owner_id" class="form-label">{{ __('Owner Product') }}</label>
                                    <div class="input-area relative">
                                        <select name="owner_id" class="form-control !pl-12">
                                            <option value="" selected disabled>
                                                {{ __('Select Owner Product') }}
                                            </option>
                                            @foreach($owners as $owner)
                                                <option value="{{ $owner->id }}">
                                                    {{ $owner->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full border-r border-r-slate-200 dark:border-r-slate-700 flex items-center justify-center dark:text-white">
                                            <iconify-icon icon="eos-icons:role-binding-outlined"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                {{--Owner input end--}}

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
