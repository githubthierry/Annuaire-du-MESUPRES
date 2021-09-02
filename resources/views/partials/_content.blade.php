@extends('welcome')

@section('content')
    <input type="checkbox" id="nav-toggle">

    @include('partials._sidebar')

    <div class="main-content">
        <main>
            @include('partials/_navbar')
            <div class="recent-grid">
                @yield('contenu')
            </div>
            @include('partials.layout.footer')
        </main>
    </div>
@stop
