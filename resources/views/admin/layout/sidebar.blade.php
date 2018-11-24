<div id="sidebar" class="nav-collapse collapse">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler hidden-phone"></div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <div class="navbar-inverse">
        <form class="navbar-search visible-phone">
            <input type="text" class="search-query" placeholder="Search" />
        </form>
    </div>
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="sidebar-menu">
        @can('system')
            <li class="has-sub active">
                <a href="javascript:;" class="">
                    <span class="icon-box"> <i class="icon-dashboard"></i></span> 系统管理
                    <span class="arrow"></span>
                </a>

                <ul class="sub">
                    <li class="active"><a class="" href="/admin/permissions">权限管理</a></li>
                    <li><a class="" href="/admin/users">用户管理</a></li>
                    <li><a class="" href="/admin/roles">角色管理</a></li>
                </ul>
            </li>
        @endcan
        @can('post')
        <li class="has-sub">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-book"></i></span> 文章管理
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="/admin/posts">文章列表</a></li>
            </ul>
        </li>
        @endcan
        @can('topic')
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <span class="icon-box"> <i class="icon-book"></i></span> 专题管理
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="/admin/topics">专题列表</a></li>
                </ul>
            </li>
        @endcan
        @can('notice')
            <li><a class="" href="/admin/notices"><span class="icon-box"><i class="icon-user"></i></span> 通知管理</a></li>
        @endcan
    </ul>
    <!-- END SIDEBAR MENU -->
</div>