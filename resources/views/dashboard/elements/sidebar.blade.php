<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="#"><img src="{{asset('dashboard/images/gamcatitle.jpg')}}" alt="Oculux Logo" class="img-fluid logo"></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{asset('dashboard/images/gamcalogo.jpg')}}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong> {{Auth::user()->name}} </strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href=""><i class="icon-user"></i> My Profile </a></li>
                    <li><a href=""><i class="icon-envelope-open"></i> Messages </a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            {{ Form::button('<i class="icon-power"></i> Logout', ['type' => 'submit', 'class' => 'btn btn-block btn-primary'] )  }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <li class="header"> Main  Dashboard </li>
                @role('admin')
                <li>
                    <a href="#uiComponents" class="has-arrow"><i class="fa fa-user-plus"></i><span> Users </span></a>
                    <ul>
                        <li><a href="{{route('users.create')}}"> Create User </a></li>
                        <li><a href="{{route('users.index')}}"> User List </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#uiComponents" class="has-arrow"><i class="icon-diamond"></i><span> Roles </span></a>
                    <ul>
                        <li><a href="{{route('roles.create')}}"> Create Role </a></li>
                        <li><a href="{{route('roles.index')}}"> Role List </a></li>
                    </ul>
                </li>
                @endrole

                @role('admin')
                <li>
                    <a href="#uiComponents" class="has-arrow"><i class="icon-diamond"></i><span> Jobs </span></a>
                    <ul>
                        <li><a href="{{route('jobs.create')}}"> Create Jobs </a></li>
                        <li><a href="{{route('jobs.index')}}"> Jobs List </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#uiComponents" class="has-arrow"><i class="icon-diamond"></i><span> Cities </span></a>
                    <ul>
                        <li><a href="{{route('cities.create')}}"> Add City </a></li>
                        <li><a href="{{route('cities.index')}}"> City List </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#uiComponents" class="has-arrow"><i class="fa fa-home"></i><span> Centers </span></a>
                    <ul>
                        <li><a href="{{route('centers.create')}}"> Add Center </a></li>
                        <li><a href="{{route('centers.index')}}"> Center List </a></li>
                    </ul>
                </li>
                @endrole

                <li>
                    <a href="#uiComponents" class="has-arrow"><i class="icon-diamond"></i><span> General Slips </span></a>
                    <ul>
                        <li><a href="{{route('generalslips.create')}}"> Add New </a></li>
{{--                        @can('genslip-list')--}}
                        <li><a href="{{route('generalslips.index')}}"> Check General List </a></li>
{{--                            @endcan--}}
                    </ul>
                </li>
@role('admin|Officer')
                <li>
                    <a href="#uiComponents" class="has-arrow"><i class="fa fa-server"></i><span> Choice Slips </span></a>
                    <ul>
                        <li><a href="{{route('choiceslips.create')}}"> Add New </a></li>
                        <li><a href="{{route('choiceslips.index')}}"> Check Choice List </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#uiComponents" class="has-arrow"><i class="fa fa-upload"></i><span> Upload Slips </span></a>
                    <ul>
                        <li><a href="{{route('slipsends.create')}}"> Add Slip </a></li>
                        <li><a href="{{route('slipsends.index')}}">Slip List </a></li>
                    </ul>
                </li>

                <li>
                    <a href="#uiComponents" class="has-arrow"><i class="fa fa-envelope-o"></i><span> Message Box </span></a>
                    <ul>
                        <li><a href="{{route('messages.create')}}"> Send Message </a></li>
                        <li><a href="{{route('messages.index')}}">Check Message </a></li>
                    </ul>
                </li>
@endrole
            </ul>
        </nav>
    </div>
</div>
