@include('layouts.partials.header')
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        {{--@include('layouts.partials.left-sidebar')--}}
        <left-sidebar url-path="{{ url('/') }}" logged-user="{{Auth::user()}}" is-admin="{{Auth::user()->hasRole('admin')}}"></left-sidebar>
        <!-- START CONTENT -->
        <section id="content">

            @include('layouts.partials.breadcrumbs')

            @yield('content')
        </section>
        <!-- END CONTENT -->
       @include('layouts.partials.sidebar')
    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
@include('layouts.partials.footer')