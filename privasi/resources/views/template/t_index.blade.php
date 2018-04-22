<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-COMPATIBLE" content="IE-Edge">
		<meta name="description" content="Belajar Laravel Bersama Rizki Fahrizal">
		<title>Learn Laravel 5.1 with Rizki Fahrizal</title>
		{!! Html::style('assets/css/bootstrap.min.css') !!}
		{!! Html::style('assets/css/simple-sidebar.css') !!}
		<style type="text/css">
		    .glyphicon-position {
		        margin-left: -20px;
		    }
            .sidebar-nav li.active {
                color: #fff;
                background: rgba(255,255,255,0.2) !important;
            }
		</style>
		<!--
        Author : Rizki Fahrizal
        Crated : April, 2018
    	-->
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{ url('home') }}">
                        Learn Laravel 5.1
                    </a>
                </li>
                <li>
                    <a href="{{ url('home') }}"><span class="glyphicon glyphicon-dashboard glyphicon-position "></span> Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('jurusan') }}"><span class="glyphicon glyphicon glyphicon-bookmark glyphicon-position"></span> Jurusan</a>
                </li>
                <li>
                    <a href="{{ url('read') }}"><span class="glyphicon glyphicon-list glyphicon-position "></span> Mahasiswa</a>
                </li>
                 <li>
                    <a href="{{ url('logout')}}" title="{{ Auth::user()->username }}"><span class="glyphicon glyphicon-off glyphicon-position "></span> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

	@yield('content')

	</div>
    <!-- /#wrapper -->

	{!! Html::script('assets/js/jquery-1.10.2.min.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
 	<!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
