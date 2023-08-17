<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{--Breadcrumb end--}}

        {{--Create owner form start--}}
        <form method="POST" action="{{ route('owners.update', $owner) }}" class="max-w-4xl m-auto">
            @csrf
            @method('PUT')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">

                <div class="grid sm:grid-cols-1 gap-x-8 gap-y-4">

                    {{--Name input start--}}
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Name Owner') }}</label>
                        <input name="name" type="text" id="name" class="form-control"
                               placeholder="{{ __('Enter name owner') }}" value="{{ $owner->name }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    {{--Name input end--}}

                    {{--Phone input start--}}
                    <div class="input-area">
                        <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                        <input name="phone" type="tel" id="phone" class="form-control"
                               placeholder="{{ __('Enter phone number owner') }}" value="{{ $owner->phone }}" required>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                    </div>
                    {{--Phone input end--}}

                    {{--Address input start--}}
                    <div class="input-area">
                        <label for="address" class="form-label">{{ __('Address') }}</label>
                        <input name="address" type="text" id="address" class="form-control"
                               placeholder="{{ __('Enter address owner') }}" value="{{ $owner->address }}">
                        <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                    </div>
                    {{--Address input end--}}

                </div>
                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Save Changes') }}
                </button>
            </div>

        </form>
        {{--Create owner form end--}}
    </div>
</x-app-layout>
