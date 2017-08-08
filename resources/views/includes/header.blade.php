
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Let's Connect</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ route('dashboard') }}">Home</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('account') }}">Account</a> </li>
            <li><a href="{{ route('logout') }}">Logout</a> </li>
        </ul>

    </div>
</nav>

