<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="/img/logo.png" alt=""> -->
        <h1>Post It !!</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/posts">Posts</a></li>
          <li><a href="/users">Users</a></li>
          <li><a href="/posts/create">Write a post</a></li>
          <li><a>
            <form action="{{ url('/sessions/'.auth()->user()->id) }}" method="POST">
              @csrf {{ csrf_field() }} @method('DELETE')
              <x-form.button class='link'>Logout</x-from.button>
            </form>
          </a></li>
         
       </ul>
        
      </nav><!-- .navbar -->

      <div class="position-relative">
      @auth
        @if(auth()->user()->image !== null) 
          <img src="{{ asset('/storage/'.auth()->user()->image) }} "
              width="40px"
              height="40px"
              class="rounded-circle"
          />
        @endif  
        Welcome <span>{{ auth()->user()->name }}</span>
      @endauth

     </div>

    </div>
</header><!-- End Header -->