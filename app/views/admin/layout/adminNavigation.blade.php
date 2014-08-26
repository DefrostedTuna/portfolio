<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::route('admin-dashboard') }}">Admin|Mode</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::route('home') }}">Home</a></li>
        <li><a href="{{ URL::route('projects')}}">Projects</a></li>
        <li><a href="{{ URL::route('about') }}">About</a></li>
        <li class="divider-vertical"></li>  

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('projects-edit') }}">Manage Projects</a></li>
            <li><a href="{{ URL::route('projects-create') }}">Create Project</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('users-edit') }}">Manage Users</a></li>
            <li><a href="{{ URL::route('account-create') }}">Create User</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('account-change-password') }}">Change password</a></li>
          </ul>
        </li>
        <li><a href="{{ URL::route('account-log-out') }}">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
