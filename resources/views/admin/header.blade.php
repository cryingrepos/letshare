<div class="topbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 hidden-xs">
                <div class="logo">
                    <a href="/">
                        <span class="logo-emblem"><img src="https://bootadmin.org/images/boot.png"
                                alt="" /></span>
                        <span class="logo-full">Bootadmin</span>
                    </a>
                </div>
                <a href="#" class="menu-toggle wave-effect">
                    <i class="feather icon-menu"></i>
                </a>
            </div>
            <div class="col-md-7 text-right">
                <ul>
                    <!-- Profile Menu -->
                    <li class="btn-group user-account">
                        <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="user-content">
                                <!--<div class="user-name">Avrt AdminPanel</div>-->
                                <div class="user-name">{{Auth::user()->name}}</div>
                            </div>
                            <!--<div class="avatar">-->
                            <!--    <img src="{{asset('img/Logo.png')}}" alt="profile" />-->
                            <!--</div>-->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript::void(0)"
                                    class="animsition-link dropdown-item wave-effect"><i
                                        class="feather icon-user"></i>Profile</a></li>
                            <li><a href="{{route('posts.index')}}"
                                    class="animsition-link dropdown-item wave-effect"><i
                                        class="feather icon-dollar-sign"></i> Posts</a></li>
                            <li><a href="{{route('seo.index')}}"
                                    class="animsition-link dropdown-item wave-effect"><i
                                        class="feather icon-settings"></i> Settings</a></li>
                            <li>
                                <form method="post" action="{{route('auth.logout')}}">
                                    <button type="submit" onclick="return confirm('Are You Sure Want to Logout?')" class="dropdown-item wave-effect" ><i
                                        class="feather icon-log-in ml-2"></i>Logout</button>
                                        @csrf
                                </form>
                           </li>
                        </ul>
                    </li>
                    <!-- Offcanvas Menu -->
                    <!--<li>-->
                    <!--    <a href="#" class="btn wave-effect offcanvas-toggle"><i-->
                    <!--            class="feather icon-settings"></i></a>-->
                    <!--</li>-->
                    <!-- Notification Menu -->
                    <!--<li class="btn-group notification">-->
                    <!--    <a href="javascript:;" class="btn dropdown-toggle wave-effect"-->
                    <!--        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--        <i class="feather icon-bell"><span class="notification-count">27</span></i>-->
                    <!--    </a>-->
                    <!--    <ul class="dropdown-menu dropdown-menu-right">-->
                    <!--        <li>-->
                    <!--            <a href="#" class="wave-effect">-->
                    <!--                <span class="avatar">-->
                    <!--                    <img src="https://bootadmin.org/images/demo/profile.png"-->
                    <!--                        alt="Mr. Chu" />-->
                    <!--                </span>-->
                    <!--                <span class="name">Jas Gillionaire</span>-->
                    <!--                <span class="message">Like your post: “Contact Form 7-->
                    <!--                    Multi-Step”</span>-->
                    <!--                <span class="time">45 min</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="#" class="wave-effect">-->
                    <!--                <span class="avatar">-->
                    <!--                    <img src="https://bootadmin.org/images/demo/user.jpg"-->
                    <!--                        alt="Andrew" />-->
                    <!--                </span>-->
                    <!--                <span class="name">Gurinder Singh</span>-->
                    <!--                <span class="message">Like your post: “Contact Form 7-->
                    <!--                    Multi-Step”</span>-->
                    <!--                <span class="time">45 min</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="#" class="wave-effect">-->
                    <!--                <span class="avatar">-->
                    <!--                    <img src="https://bootadmin.org/images/demo/profile.png"-->
                    <!--                        alt="Mr. Chu" />-->
                    <!--                </span>-->
                    <!--                <span class="name">Andrew the Canadian</span>-->
                    <!--                <span class="message">Like your post: “Contact Form 7-->
                    <!--                    Multi-Step”</span>-->
                    <!--                <span class="time">45 min</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="#" class="wave-effect">-->
                    <!--                <span class="avatar">-->
                    <!--                    <img src="https://bootadmin.org/images/demo/user.jpg"-->
                    <!--                        alt="Mr. Chu" />-->
                    <!--                </span>-->
                    <!--                <span class="name">Artsy Shohan</span>-->
                    <!--                <span class="message">Like your post: “Contact Form 7-->
                    <!--                    Multi-Step”</span>-->
                    <!--                <span class="time">45 min</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="#" class="wave-effect">-->
                    <!--                <span class="avatar">-->
                    <!--                    <img src="https://bootadmin.org/images/demo/profile.png"-->
                    <!--                        alt="Mr. Chu" />-->
                    <!--                </span>-->
                    <!--                <span class="name">Sazzad Shammad</span>-->
                    <!--                <span class="message">Like your post: “Contact Form 7-->
                    <!--                    Multi-Step”</span>-->
                    <!--                <span class="time">45 min</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li><a href="/notification"-->
                    <!--                class="dropdown-item all-notifications wave-effect">See more messages-->
                    <!--                <i class="feather icon-arrow-down"></i></a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <li class="mobile-menu-toggle">
                        <a href="#" class="menu-toggle wave-effect">
                            <i class="feather icon-menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
