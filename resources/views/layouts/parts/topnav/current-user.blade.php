<li class="dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
        <div>{{Auth::user()->display_name}}</div>
        <small>{{Auth::user()->role->name}}</small>
    </a>
    <ul class="dropdown-menu">
        <li class="header">{{Auth::user()->display_name}}</li>
        <li class="body">
            <div class="slimScrollDiv m-l-25">
                <h3>WELCOME!</h3>
                <p>TODO: Details about current user here</p>
            </div>
        </li>
    </ul>
</li>