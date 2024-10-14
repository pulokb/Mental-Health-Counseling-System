{{-- @include('layouts.menu') --}}
<li class="app-sidebar__heading">{{ __('Welcome To The MindQuilo') }}</li>
{{-- Dashboard --}}
@can('dashboard-view')
    <li class="">
        <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->route()->getName() == 'admin.dashboard'? 'mm-active': '' }}">
            <i class="metismenu-icon pe-7s-box2"></i>
            {{ __('Dashboard') }}
        </a>
    </li>
@endcan
{{-- <li class="app-sidebar__heading">{{ __('Application  MENU') }}</li> --}}
{{-- Users --}}
@can('user-view')
    @if (Route::has('admin.users.index'))
        <li class="">
            <a href="{{ route('admin.users.index') }}" class="{{ Request::is(config('admin.admin_route_prefix').'/users**') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-users"></i>
                {{ __('Users') }}
            </a>
        </li>
    @endif
@endcan

{{-- Contacts --}}
@can('contact-view')
    @if (Route::has('admin.contacts'))
        <li class="">
            <a href="{{ route('admin.contacts') }}"
                class="{{ request()->route()->getName() == 'admin.contacts'? 'mm-active': '' }}">
                <i class="metismenu-icon pe-7s-network"></i>
                {{ __('Contacts') }}
            </a>
        </li>
    @endif
@endcan
{{-- Feedbacks --}}
@can('feedback-view')
    @if (Route::has('admin.feedbacks'))
        <li class="">
            <a href="{{ route('admin.feedbacks') }}"
                class="{{ request()->route()->getName() == 'admin.feedbacks'? 'mm-active': '' }}">
                <i class="metismenu-icon pe-7s-note2"></i>
                {{ __('Feedbacks') }}
            </a>
        </li>
    @endif
@endcan
<li class="app-sidebar__heading">{{ __('System Menu') }}</li>

{{-- Setting --}}
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-settings"></i>
        {{ __('Settings') }}
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        @can('setting-view')
            <li class="{{ request()->route()->getName() == 'admin.settings.index'? 'mm-active': '' }}">
                <a href="{{ route('admin.settings.index') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('General Setting') }}
                </a>
            </li>
        @endcan
        @can('setting-view')
            <li class="{{ request()->route()->getName() == 'admin.settings.updateEmailSettingView'? 'mm-active': '' }}">
                <a href="{{ route('admin.settings.updateEmailSettingView') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('Email Setting') }}
                </a>
            </li>
        @endcan
        @can('Language-view')
            <li class="{{ Request::is(config('admin.admin_route_prefix').'/languages**') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.languages.index') }}" class="">
                    <i class="metismenu-icon pe-7s-comment"></i>
                    {{ __('Languages') }}
                </a>
            </li>
        @endcan
        {{-- Backup --}}
        @can('backup')
            <li class="{{ request()->route()->getName() == 'admin.backups.index'? 'mm-active': '' }}">
                <a href="{{ route('admin.backups.index') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('Backup') }}
                </a>
            </li>
        @endcan

        @can('role-view')
            <li class="{{ Request::is(config('admin.admin_route_prefix').'/roles**') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.roles.index') }}" class="">
                    <i class="metismenu-icon pe-7s-user"></i>
                    {{ __('Roles') }}
                </a>
            </li>
        @endcan
        @can('admin-view')
            <li class="{{ Request::is(config('admin.admin_route_prefix').'/admins**') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.admins.index') }}" class="">
                    <i class="metismenu-icon pe-7s-add-user"></i>
                    {{ __('System Administrator') }}
                </a>
            </li>
        @endcan
        @can('maintenance-mode')
            <li class="{{ request()->route()->getName() == 'admin.maintenanceMode'? 'mm-active': '' }}">
                <a href="{{ route('admin.maintenanceMode') }}" class="">
                    <i class="metismenu-icon pe-7s-hammer"></i>
                    {{ __('Maintenance Mode') }}
                </a>
            </li>
        @endcan
    </ul>
</li>



@can('log-activity-view')
    <li>
        <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            {{ __('Activity Log') }}
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul>
            <li class="{{ request()->route()->getName() == 'admin.userLoginActivity'? 'mm-active': '' }}">
                <a href="{{ route('admin.userLoginActivity') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('User Login Activity') }}
                </a>
            </li>
            <li class="{{ request()->route()->getName() == 'admin.adminLoginActivity'? 'mm-active': '' }}">
                <a href="{{ route('admin.adminLoginActivity') }}">
                    <i class="metismenu-icon">
                    </i>{{ __('Admin Login Activity') }}
                </a>
            </li>
            <li class="{{ request()->route()->getName() == 'admin.systemActivityLog'? 'mm-active': '' }}">
                <a href="{{ route('admin.systemActivityLog') }}">
                    <i class="metismenu-icon">
                    </i>
                    {{ __('System Activity Log') }}
                </a>
            </li>
        </ul>
    </li>
@endcan
@if (auth()->user()->can('Visitor-info') ||
        auth()->user()->can('Visitor-block-list'))
    <li>
        <a href="#">
            <i class="metismenu-icon pe-7s-id"></i>
            {{ __('Visitors') }}
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul>
            @can('Visitor-info')
                <li class="{{ request()->route()->getName() == 'admin.visitorInfo'? 'mm-active': '' }}">
                    <a href="{{ route('admin.visitorInfo') }}">
                        <i class="metismenu-icon"></i>
                        {{ __('Visitor Info') }}
                    </a>
                </li>
            @endcan
            @can('Visitor-block-list')
                <li class="{{ request()->route()->getName() == 'admin.visitorBlockList'? 'mm-active': '' }}">
                    <a href="{{ route('admin.visitorBlockList') }}">
                        <i class="metismenu-icon"></i>
                        {{ __('Visitor Block List') }}
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif
{{-- @endcan --}}
@if (auth()->user()->can('Page-view') ||
        auth()->user()->can('Content-view'))
    <li>
        <a href="#">
            <i class="metismenu-icon pe-7s-album"></i>
            {{ __('Frontend CMS') }}
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul>
            @can('Page-view')
                <li class="{{ Request::is(config('admin.admin_route_prefix').'/frontend-cms/page**') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.frontendCMS.page') }}">
                        <i class="metismenu-icon"></i>
                        {{ __('Pages') }}
                    </a>
                </li>
            @endcan
            @can('Content-view')
                <li class="{{ request()->route()->getName() == 'admin.frontendCMS.content'? 'mm-active': '' }}">
                    <a href="{{ route('admin.frontendCMS.content') }}">
                        <i class="metismenu-icon"></i>
                        {{ __('Content') }}


                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endIf


{{-- <li class="">
    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
    document.g                        etElementById('logout-form').submit();">
        <i class="metismenu-icon pe-7s-back"></i>
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li> --}}
{{-- @can('NewTest2-view')
<li class="">
    <a href="{{route('admin.newTest2s.index')}}" class="{{ Request::is(config('admin.admin_route_prefix').'/newTest2s**') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-menu"></i>
        {{ __('New Test2S') }}
    </a>
</li>
@endcan

@can('UserQuery-view')
<li class="">
    <a href="{{route('admin.userQueries.index')}}" class="{{ Request::is(config('admin.admin_route_prefix').'/userQueries**') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-menu"></i>
        {{ __('User Queries') }}
    </a>
</li>
@endcan --}}

@can('DoctorFeedback-view')
<li class="">
    <a href="{{route('admin.doctorFeedbacks.index')}}" class="{{ Request::is(config('admin.admin_route_prefix').'/doctorFeedbacks**') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-note2"></i>
        {{ __('Doctor Feedbacks') }}
    </a>
</li>
@endcan

@can('Symptoms-view')
<li class="">
    <a href="{{route('admin.symptoms.index')}}" class="{{ Request::is(config('admin.admin_route_prefix').'/symptoms**') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-photo-gallery"></i>
        {{ __('Symptoms') }}
    </a>
</li>
@endcan

@can('Suggestions-view')
<li class="">
    <a href="{{route('admin.suggestions.index')}}" class="{{ Request::is(config('admin.admin_route_prefix').'/suggestions**') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-notebook"></i>
        {{ __('Suggestions') }}
    </a>
</li>
@endcan

