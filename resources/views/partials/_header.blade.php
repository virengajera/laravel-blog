<header class="sticky-top">
    <nav class="navbar bg-body-tertiary px-5 py-4">
      <div class="container-fluid">
      <a class="navbar-brand" href="/">Laravel Blog</a>
        @auth           
          <div class="d-flex" >
            
            <p class="px-3">Welcome {{auth()->user()->name}}</p>
            <a href="/blog/myblog" class="px-3">My Blogs</a>
            <form class="inline" method="POST" action="/logout">
              @csrf
              <button type="submit">
                <i class="fa-solid fa-door-closed"></i> Logout
              </button>
            </form>
          </div>
        @else          
          <div class="d-flex" >
            <a href="/login" class="px-3">Login</a>
            <a href="/register" class="px-3">Register</a>
          </div>
          @endauth
      </div>

      </nav>
</header>

