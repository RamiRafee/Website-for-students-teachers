@include('admin.layouts.head');

@include('admin.layouts.aside');

@include('admin.layouts.right-header')


    @yield('breadcrumbs')
    
    @yield('content')
    

@include('admin.layouts.footer')

<!-- Right Panel -->

@include('admin.layouts.scripts')