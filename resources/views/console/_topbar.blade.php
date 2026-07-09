{{-- Top Bar --}}
<header class="sticky top-0 z-30 bg-white border-b border-gray-200 h-16 flex items-center px-4 sm:px-6 lg:px-8">
    <button type="button" class="lg:hidden p-2 -ml-2 rounded-lg hover:bg-gray-100 mr-3" id="mobile-sidebar-toggle">
        <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
    </button>
    <h1 class="text-sm font-semibold text-gray-700">@yield('page_title', 'Dashboard')</h1>
</header>
