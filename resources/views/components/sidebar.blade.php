<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('dashboard.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-chat">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Apps</li>
                <li>
                    <a class="has-arrow waves-effect">
                        <i class="fa-solid fa-cubes"></i>
                        <span key="t-dashboards">Niche</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/niche/create') }}">Add Niche</a></li>
                        <li><a href="{{ url('/niche') }}">View Niche</a>
                        <li><a href="{{ url('/niche/recyclebin') }}">Recycle-Bin</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect">
                        <i class="fa-solid fa-circle-plus"></i>
                        <span key="t-dashboards">Collection</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('##') }}">Add Collection</a></li>
                        <li><a href="{{ url('##') }}">View Collection</a>
                        <li><a href="{{ url('##') }}">Recycle-Bin</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect">
                        <i class="fa-solid fa-layer-group"></i>
                        <span key="t-dashboards">Designer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('##') }}">Add Designer</a></li>
                        <li><a href="{{ url('##') }}">View Designer</a>
                        <li><a href="{{ url('##') }}">Recycle-Bin</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
