@props(['breadcrumbItems' => [], 'pageTitle'=>'Default Title'])
<div class="flex items-center justify-between">
    {{--Breadcrumb title start--}}
    <h5 class="text-textColor font-Inter font-medium md:text-2xl mr-4 dark:text-white mb-1 sm:mb-0">
        {{ __($pageTitle) }}
    </h5>

    {{--Breadcrumb list start--}}
    <ul class="m-0 p-0 list-none">
        {{--Home--}}
        @empty(!$breadcrumbItems)
            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter">
                <a href="{{ route('dashboard.index') }}" class="breadcrumbList text-sm justify-center items-center">
                    <iconify-icon icon="ant-design:home-twotone"></iconify-icon>
                </a>
                <iconify-icon icon="heroicons-outline:chevron-right" class="text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
            </li>
        @endempty

        @foreach($breadcrumbItems as $breadcrumbItem)
            @if($breadcrumbItem['active'])
                {{--Active--}}
                <li class="inline-block">
                    <a href="{{ $breadcrumbItem['url'] }}" class="breadcrumbList breadcrumbActive inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                        {{ __($breadcrumbItem['name']) }}
                    </a>
                </li>
            @else
                {{--Not active--}}
                <li class="inline-block relative text-sm text-primary-500 font-Inter">
                    <a href="{{ $breadcrumbItem['url'] }}" class="breadcrumbList text-sm">
                        {{ __($breadcrumbItem['name']) }}
                    </a>
                    <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                </li>
            @endif
        @endforeach
    </ul>
</div>
