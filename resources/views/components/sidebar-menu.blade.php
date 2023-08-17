<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">

        <!-- Application Logo -->
        <x-application-logo />

        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200" icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200" icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">{{ __('MENU') }}</li>
            <li>
                <a href="{{ route('dashboard.index') }}" class="navItem {{ (\Request::route()->getName() == 'dashboard.index') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="ant-design:home-twotone"></iconify-icon>
                        <span>{{ __('Dashboard') }}</span>
                    </span>
                </a>
            </li>

            <li class="{{ (request()->is('product*')) || (request()->is('product-types*')) ? 'active' : '' }}">
                <a href="#" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="solar:box-minimalistic-bold-duotone"></iconify-icon>
                        <span>{{ __('Promotions') }}</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#" class="navItem">{{ __('Product') }}</a>
                    </li>
                    <li>
                        <a href="#" class="navItem">{{ __('Categories') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product-types.index') }}" class="navItem {{ (request()->is('product-types*')) ? 'active' : '' }}">{{ __('Type') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('owners.index') }}" class="navItem {{ (request()->is('owners*')) ? 'active' : '' }}">{{ __('Owner') }}
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="{{ (request()->is('users*')) || (request()->is('profiles*')) || (request()->is('roles*')) || (request()->is('permissions*')) ? 'active' : '' }}">
                <a href="#" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                        <span>{{ __('Users') }}</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('users.index') }}" class="navItem {{ (request()->is('users*')) ? 'active' : '' }}">{{ __('All Users') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('profiles.index') }}" class="navItem {{ (request()->is('profiles*')) ? 'active' : '' }}">{{ __('Profiles') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}" class="navItem {{ (request()->is('roles*')) ? 'active' : '' }}">{{ __('Roles') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('permissions.index') }}" class="navItem {{ (request()->is('permissions*')) ? 'active' : '' }}">{{ __('Permissions') }}
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('general-settings.show') }}"
                   class="navItem {{ (request()->is('general-settings*')) || (request()->is('database-backups*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="solar:settings-bold-duotone"></iconify-icon>
                        <span>{{ __('Settings') }}</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
