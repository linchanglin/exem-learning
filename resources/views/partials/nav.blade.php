<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" style="width: 960px;">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="/img/brand.jpg">
                </a>
                <li><a href="#about"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>主页</a></li>

                <li>
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            我的考试
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="/lessons">进行中的考试</a></li>
                            <li><a href="/lessons-done">已完成的考试</a></li>
                            <li><a href="/lessons-overdue">已过期的考试</a></li>
                        </ul>
                    </div>
                </li>

                <li><a href="#contact">资料库</a></li>
                <li><a href="#contact">讨论区</a></li>

                @can('ifAdmin',Auth::user())
                <li><a href="#contact">报表</a></li>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            学习管理
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">课程管理</a></li>
                            <li><a href="/exams">考试管理</a></li>
                            <li><a href="/questionBanks">题库管理</a></li>
                            <li><a href="#">评估管理</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#contact">用户管理</a></li>
                <li><a href="#contact">系统管理</a></li>
                @endcan

                <li class="pull-right">
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                            {{ Auth::user()->name }}({{ Auth::user()->role->role }})
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">个人信息</a></li>
                            <li><a href="">使用帮助</a></li>
                            <li><a href="/logout">注销</a></li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>

