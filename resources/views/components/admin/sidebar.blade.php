<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{route('main')}}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{asset('assets/images/logoo.jfif')}}" alt="" style="width: 60px; height: 60px; !important;" class="logo logo-lg"/>
                <img src="{{asset('assets/images/logoo.jfif')}}" alt="" class="logo logo-sm"/>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{route('dashboard')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Boshqaruv paneli</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{route('news.index')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-layout"></i></span>
                        <span class="nxl-mtext">Yangiliklar</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{route('authors.index')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-layout"></i></span>
                        <span class="nxl-mtext">Avtorlar</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{route('categories.index')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-layout"></i></span>
                        <span class="nxl-mtext">Kategoriyalar</span><span class="nxl-arrow"></span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
