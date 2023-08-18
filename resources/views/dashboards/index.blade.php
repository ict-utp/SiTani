<x-app-layout>

    <!-- START:: Breadcrumbs -->
    <div class="mb-6">
        {{--Breadcrumb start--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        {{--Breadcrumb end--}}
    </div>
    <!-- END:: Breadcrumbs -->

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-3 lg:col-span-4 col-span-12">
            <div class="bg-no-repeat bg-cover bg-center p-5 rounded-[6px] relative" style="background-image: url(images/all-img/widget-bg-2.png)">
                <div>
                    <h4 class="text-xl font-medium text-white mb-2">
                        <span class="block font-normal">Selamat {{ $data['greetings'] }},</span>
                        <span class="block">{{ auth()->user()->name }}</span>
                    </h4>
                    <p class="text-sm text-white font-normal">{{ __('Welcome to ') }} {{ config('app.name', 'SiTani') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-5">
        <div class="lg:col-span-12 col-span-12">
            <div class="card">
                <header class="card-header noborder">
                    <h4 class="card-title">Lastest Users</h4>
                </header>
                <div class="card-body p-6">
                    <div class="overflow-x-auto -mx-6">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                    <thead class="  bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class="table-th">
                                                {{ __('NAME') }}
                                            </th>
                                            <th scope="col" class="table-th">
                                                {{ __('EMAIL') }}
                                            </th>
                                            <th scope="col" class="table-th">
                                                {{ __('MEMBER SINCE') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach($data['users'] as $user)
                                        <tr>
                                            <td class="table-td">
                                                <div class="flex items-center">
                                                    <div class="flex-none">
                                                        <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                                            <img class="w-full h-full rounded-[100%] object-cover" src="{{Avatar::create($user->name)->toBase64() }}" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 text-start">
                                                        <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                            <p class="normal-case">{{ $user->name }}</p>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="table-td"><p class="normal-case">{{ $user->email }}</p></td>
                                            <td class="table-td ">{{ $user->created_at->diffForHumans() }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-area flex flex-wrap gap-3 items-center justify-center pt-8 px-8">
                                {{ $data['users']->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
