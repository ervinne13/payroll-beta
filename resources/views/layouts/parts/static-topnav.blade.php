<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars" style="display: block;"></a>
            <a class="navbar-brand" href="../../index.html">{{config("app.name")}}</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                @include('layouts.parts.topnav.dropdown-notifications')

                @if (Auth::check())
                @include('layouts.parts.topnav.current-user')
                @endif

            </ul>
        </div>
    </div>
</nav>