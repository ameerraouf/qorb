<div id="aside" class="app-aside modal fade folded md nav-expand">
    <div class="left navside dark dk" layout="column">
        <div class="navbar navbar-md no-radius">
            <!-- brand -->
            <a class="navbar-brand" href="{{ route('adminHome') }}">
                <img src="{{ asset('assets/dashboard/images/logo.png') }}" alt="Control">
                <span class="hidden-folded inline">{{ __('backend.control') }}</span>
            </a>
            <!-- / brand -->
        </div>
        <div flex class="hide-scroll">
            <nav class="scroll nav-active-primary">

                <ul class="nav" ui-nav>
                    <li class="nav-header hidden-folded">
                        <small class="text-muted">{{ __('backend.main') }}</small>
                    </li>

                    <li>
                        <a href="{{ route('teacher.teacherhome') }}">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe3fc;</i>
                            </span>
                            <span class="nav-text">{{ __('backend.dashboard') }}</span>
                        </a>
                    </li>
                    <li class=" {{ request()->is('*childrens*') ? 'active' : '' }}">
                        <a href="{{ route('childrens.index') }}" >
                            <span class="nav-icon">
                                <i class="material-icons">&#xe3fc;</i>
                            </span>
                            <span class="nav-text">{{ __('teacher.childrens') }}</span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="nav-caret">
                                <i class="fa fa-caret-down"></i>
                            </span>
                            <span class="nav-icon">
                                <i class="material-icons">&#xe1b8;</i>
                            </span>
                            <span class="nav-text">{{ __('teacher.package') }}</span>
                        </a>
                        <ul class="nav-sub">
                            <li>
                                <a href="{{ route('TeacherPackages') }}">
                                    <span
                                        class="nav-text">{{ __('teacher.package') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span
                                        class="nav-text">{{ __('teacher.purchaseTransaction') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('TeacherProfile') }}">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe3fc;</i>
                            </span>
                            <span class="nav-text">{{ __('teacher.profile') }}</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
