<div class="sidebar">
    <div class="logo">
        <a href="{{route('avrt.home')}}">
            <span class=""><img src="{{asset('img/Logo.png')}}"
                    alt="admin-panel" /></span>
        </a>
    </div>
    <ul id="sidebarCookie">
        <!--<li class="spacer"></li>-->
        <!--<li class="profile">-->
        <!--    <span class="profile-image">-->
        <!--        <img src="{{asset('img/Logo.png')}}" alt="profile" />-->
        <!--    </span>-->
        <!--    <span class="profile-name">-->
        <!--      {{Auth::user()->name}}-->
        <!--    </span>-->
        <!--    <span class="profile-info">-->
        <!--        Admin-->
        <!--    </span>-->
        <!--</li>-->
        <!--<li class="spacer"></li>-->
        <li class="title">
            <i class="feather icon-more-horizontal"></i>
            <span class="menu-title">Applets</span>
        </li>
        <li class="nav-item">
            <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"
                data-toggle="collapse" href="#posts_applet" aria-expanded="false"
                aria-controls="page-dashboards">
                <i class="feather icon-grid"></i>
                <span class="menu-title">Posts</span>
                <i class="feather icon-chevron-down down-arrow"></i>
            </a>
            <div class="collapse" id="posts_applet">
                <ul class="flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('posts.index')}}">
                            <i class="feather icon-layout"></i>
                            <span class="menu-title">List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('posts.create')}}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-title">Create</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"
                data-toggle="collapse" href="#comments" aria-expanded="false"
                aria-controls="page-dashboards">
                <i class="feather icon-grid"></i>
                <span class="menu-title">Comments</span>
                <i class="feather icon-chevron-down down-arrow"></i>
            </a>
            <div class="collapse" id="comments">
                <ul class="flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('comments.index')}}">
                            <i class="feather icon-layout"></i>
                            <span class="menu-title">List</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
         <li class="nav-item">
            <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"
                data-toggle="collapse" href="#faq" aria-expanded="false"
                aria-controls="page-dashboards">
                <i class="feather icon-grid"></i>
                <span class="menu-title">FAQ</span>
                <i class="feather icon-chevron-down down-arrow"></i>
            </a>
            <div class="collapse" id="faq">
                <ul class="flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('faq.index')}}">
                            <i class="feather icon-layout"></i>
                            <span class="menu-title">List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('faq.create')}}">
                            <i class="feather icon-layout"></i>
                            <span class="menu-title">Create</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
              <li class="title">
            <i class="feather icon-more-horizontal"></i>
            <span class="menu-title">Settings</span>
        </li>
        <li class="nav-item">
            <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"
                data-toggle="collapse" href="#application" aria-expanded="false"
                aria-controls="page-dashboards">
                <i class="feather icon-grid"></i>
                <span class="menu-title">Application</span>
                <i class="feather icon-chevron-down down-arrow"></i>
            </a>
            <div class="collapse" id="application">
                <ul class="flex-column sub-menu">
                    <li class="nav-item">
                        <a href="{{route('application.index')}}" class="nav-link wave-effect" href="">
                            <i class="feather icon-layout"></i>
                            <span class="menu-title">List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('application.create')}}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-title">Create</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#mailer" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Mailer Setting</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="mailer">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a href="{{route('mailer.index')}}" class="nav-link wave-effect">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="{{route('mailer.create')}}">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
          <li class="nav-item">
            <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"
                data-toggle="collapse" href="#seo" aria-expanded="false"
                aria-controls="page-dashboards">
                <i class="feather icon-grid"></i>
                <span class="menu-title">Seo Setting</span>
                <i class="feather icon-chevron-down down-arrow"></i>
            </a>
            <div class="collapse" id="seo">
                <ul class="flex-column sub-menu">
                    <li class="nav-item">
                        <a href="{{route('seo.index')}}" class="nav-link wave-effect">
                            <i class="feather icon-layout"></i>
                            <span class="menu-title">List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('seo.create')}}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-title">Create</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!--<li class="title">-->
        <!--    <i class="feather icon-more-horizontal"></i>-->
        <!--    <span class="menu-title">Payment Integration</span>-->
        <!--</li>-->
        <!--  <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#application" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Paypal</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="application">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a href="{{route('application.index')}}" class="nav-link wave-effect" href="">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="{{route('application.create')}}">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!-- <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#mailer" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Razorpay</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="mailer">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a href="{{route('mailer.index')}}" class="nav-link wave-effect">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="{{route('mailer.create')}}">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!--  <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#seo" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Stripe</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="seo">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a href="{{route('seo.index')}}" class="nav-link wave-effect">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="{{route('seo.create')}}">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!--  <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#application" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Pay U Money</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="application">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a href="{{route('application.index')}}" class="nav-link wave-effect" href="">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="{{route('application.create')}}">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!--<li class="title">-->
        <!--    <i class="feather icon-more-horizontal"></i>-->
        <!--    <span class="menu-title">SEO SETTINGS</span>-->
        <!--</li>-->
        <!--  <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#seo" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Meta Setting</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="seo">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a href="{{route('seo.index')}}" class="nav-link wave-effect">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="{{route('seo.create')}}">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!-- <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#seo" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Site Map Setting</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="seo">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a href="{{route('seo.index')}}" class="nav-link wave-effect">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="{{route('seo.create')}}">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!-- <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#seo" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Google Analytics Setting</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="seo">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a href="{{route('seo.index')}}" class="nav-link wave-effect">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="{{route('seo.create')}}">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        
        <!-- <li class="title">-->
        <!--    <i class="feather icon-more-horizontal"></i>-->
        <!--    <span class="menu-title">Security</span>-->
        <!--</li>-->
        
        <!--  <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#seo" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">reCAPTCHA Setting</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="seo">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a href="{{route('seo.index')}}" class="nav-link wave-effect">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="{{route('seo.create')}}">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->

        </li>
           <li class="title">
            <i class="feather icon-more-horizontal"></i>
            <span class="menu-title">CMS</span>
          </li>
             <li class="nav-item">
            <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"
                data-toggle="collapse" href="#pages" aria-expanded="false"
                aria-controls="page-dashboards">
                <i class="feather icon-grid"></i>
                <span class="menu-title">Applets</span>
                <i class="feather icon-chevron-down down-arrow"></i>
            </a>
            <div class="collapse" id="pages">
                <ul class="flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('applets.index')}}">
                            <i class="feather icon-layout"></i>
                            <span class="menu-title">List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('applets.create')}}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-title">Create</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
              <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"
                data-toggle="collapse" href="#user_interface" aria-expanded="false"
                aria-controls="page-dashboards">
                <i class="feather icon-grid"></i>
                <span class="menu-title">Pages</span>
                <i class="feather icon-chevron-down down-arrow"></i>
            </a>
            <div class="collapse" id="user_interface">
                <ul class="flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('pages.home')}}">
                            <i class="feather icon-layout"></i>
                            <span class="menu-title">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('pages.faq')}}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-title">FAQ</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('pages.back')}}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-title">Background</span>
                        </a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('pages.message')}}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-title">Message</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('pages.whoweare')}}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-title">Who Are We</span>
                        </a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link wave-effect" href="{{route('pages.contact')}}">
                            <i class="feather icon-shopping-bag"></i>
                            <span class="menu-title">Contact Info</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
          
        <!--    <li class="title">-->
        <!--    <i class="feather icon-more-horizontal"></i>-->
        <!--    <span class="menu-title">Personal Space</span>-->
        <!--  </li>-->
        <!-- <li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#user_applet" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Users</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="user_applet">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="javascript::void(0)">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">List</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="javascript::void(0)">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Create</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#discussion" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Discussion</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="discussion">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="javascript::void(0)">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">Join Discussion</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="javascript::void(0)">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title"></span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
         

        <!--<li class="title">-->
        <!--    <i class="feather icon-more-horizontal"></i>-->
        <!--    <span class="menu-title">Main</span>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed wave-effect" data-parent="#sidebarCookie"-->
        <!--        data-toggle="collapse" href="#navDashboard" aria-expanded="false"-->
        <!--        aria-controls="page-dashboards">-->
        <!--        <i class="feather icon-grid"></i>-->
        <!--        <span class="menu-title">Dashboard</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="navDashboard">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">Dashboard</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">eCommerce</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link js-darkSidebar wave-effect" href="javascript: void();">-->
        <!--                    <i class="feather icon-shopping-bag"></i>-->
        <!--                    <span class="menu-title">Toggle Sidebar Color</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed" data-parent="#sidebarCookie" data-toggle="collapse"-->
        <!--        href="#navPageLayouts" aria-expanded="false" aria-controls="page-layouts">-->
        <!--        <i class="feather icon-sidebar"></i>-->
        <!--        <span class="menu-title">Page Layouts</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="navPageLayouts">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/">-->
        <!--                    <i class="feather icon-layout"></i>-->
        <!--                    <span class="menu-title">Default</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/boxed">-->
        <!--                    <i class="feather icon-bold"></i>-->
        <!--                    <span class="menu-title">Boxed</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/horizontal">-->
        <!--                    <i class="feather icon-pause"></i>-->
        <!--                    <span class="menu-title">Horizontal Menu</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/boxedhorizontal">-->
        <!--                    <i class="feather icon-copy"></i>-->
        <!--                    <span class="menu-title">Boxed &amp; Horizontal</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed" data-parent="#sidebarCookie" data-toggle="collapse"-->
        <!--        href="#navElements" aria-expanded="false" aria-controls="page-elements">-->
        <!--        <i class="feather icon-layout"></i>-->
        <!--        <span class="menu-title">Elements</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="navElements">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/elements/bootstrap">-->
        <!--                    <i class="feather icon-bold"></i>-->
        <!--                    <span class="menu-title">Bootstrap</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/elements/gallery">-->
        <!--                    <i class="feather icon-image"></i>-->
        <!--                    <span class="menu-title">Gallery</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/elements/cards">-->
        <!--                    <i class="feather icon-credit-card"></i>-->
        <!--                    <span class="menu-title">Cards</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/elements/grid">-->
        <!--                    <i class="feather icon-grid"></i>-->
        <!--                    <span class="menu-title">Grid</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!--<li class="title">-->
        <!--    <i class="feather icon-more-horizontal"></i>-->
        <!--    <span class="menu-title">App Features</span>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed" data-parent="#sidebarCookie" data-toggle="collapse"-->
        <!--        href="#navMailbox" aria-expanded="false" aria-controls="page-mailbox">-->
        <!--        <i class="feather icon-mail"></i>-->
        <!--        <span class="menu-title">Mailbox</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="navMailbox">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/app/inbox">-->
        <!--                    <i class="feather icon-inbox"></i>-->
        <!--                    <span class="menu-title">Inbox</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/app/inbox/email">-->
        <!--                    <i class="feather icon-mail"></i>-->
        <!--                    <span class="menu-title">Email</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/app/inbox/compose">-->
        <!--                    <i class="feather icon-send"></i>-->
        <!--                    <span class="menu-title">Compose</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a href="http://bootadmin.org/app/calendar" class="nav-link wave-effect nav-single">-->
        <!--        <i class="feather icon-calendar"></i>-->
        <!--        <span class="menu-title">Calendar</span>-->
        <!--    </a>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a class="nav-link wave-effect collapsed" data-parent="#sidebarCookie" data-toggle="collapse"-->
        <!--        href="#navProfilebox" aria-expanded="false" aria-controls="page-profilebox">-->
        <!--        <i class="feather icon-users"></i>-->
        <!--        <span class="menu-title">Account</span>-->
        <!--        <i class="feather icon-chevron-down down-arrow"></i>-->
        <!--    </a>-->
        <!--    <div class="collapse" id="navProfilebox">-->
        <!--        <ul class="flex-column sub-menu">-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/account/profile">-->
        <!--                    <i class="feather icon-user"></i>-->
        <!--                    <span class="menu-title">Profile</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/account/billing">-->
        <!--                    <i class="feather icon-dollar-sign"></i>-->
        <!--                    <span class="menu-title">Billing</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li class="nav-item">-->
        <!--                <a class="nav-link wave-effect" href="http://bootadmin.org/account/settings">-->
        <!--                    <i class="feather icon-settings"></i>-->
        <!--                    <span class="menu-title">Settings</span>-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</li>-->
        <!--<li class="title">-->
        <!--    <i class="feather icon-more-horizontal"></i>-->
        <!--    <span class="menu-title">Misc</span>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a href="http://bootadmin.org/credits" class="nav-link wave-effect nav-single">-->
        <!--        <i class="feather icon-zap"></i>-->
        <!--        <span class="menu-title">Credits</span>-->
        <!--    </a>-->
        <!--</li>-->
        <!--<li class="spacer"></li>-->
        <li class="button-container">
            <form method="post" action="{{route('auth.logout')}}">
                <button type="submit" class="btn btn-primary display-block" onclick="return confirm('Are you sure Want to Logout?)"><i class="feather icon-log-in"></i><span class="ml-2">Logout</span></button>
                @csrf
            </form>
        </li>
    </ul>
</div>
