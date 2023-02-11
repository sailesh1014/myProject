<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Home Page</h2>
<div class="menu-item px-5">
    <a href="#" class="menu-link px-5" onclick="
                    event.preventDefault();
                    document.getElementById('dashboard-logout').submit();
                    ">
        <span>Logout</span>
        <i class="fe-log-out"></i>
    </a>
    <form id="dashboard-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
</body>
</html>
