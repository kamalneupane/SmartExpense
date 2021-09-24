<nav class="nav sticky-top">
    <h2><a href="{{route('home')}}">
        @if(Auth::user()->company_id!=null)
            {{Auth::user()->company_name}}
        @else
            {{trans('app.companies-title')}}
        @endif
    </a></h2>
    <ul>
        
        <li><a href="{{route('company.index')}}">Change Company</a></li>
        <li><a href="{{route('categories-periods.index')}}">Dept. & Periods</a></li>
        <li><a href="#">Budget</a></li>
        <li><a href="#">Expense Request</a></li>
        <li><a href="{{route('user.index')}}">Users &nbsp;<i class="fas fa-user"></i></a></li>
        <li><a href="#">Reports &nbsp;<i class="fas fa-eye"></i></a></li>
        <li>
            <form action="#" method="#" role="search" class="form-inline">
                <input type="text" placeholder="search" name="search" class="form-control">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </li>
        <li>
            <a href="#">
                <img src="/img/favicon.ico" alt="icon">
            </a>
        </li>
        <li>
            <a><i class="fas fa-cog care"></i><span class="fas fa-caret-down care"></span></a>
            <ul>
                <li><a href="#">Name</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>