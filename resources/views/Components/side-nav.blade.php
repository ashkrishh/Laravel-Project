
    <!-- START preloader-wrapper -->
    <div class="preloader-wrapper">
        <div class="preloader-inner">
            <div class="spinner-border text-red"></div>
        </div>
    </div>
    <!-- END preloader-wrapper -->
    
    <!-- START main-wrapper -->
   
  
<!-- start of sidenav -->
<aside><div class="sidenav position-sticky d-flex flex-column justify-content-between">
    <a class="navbar-brand" href="index.html" class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="">
    </a>
    <!-- end of navbar-brand -->

    <div class="navbar navbar-dark my-4 p-0 font-primary">
        <ul class="navbar-nav w-100">
            <li class="nav-item active">
                <a class="nav-link text-white px-0 pt-0" href="/posts">Posts</a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link text-white px-0" href="/posts/create">Write a post</a>
            </li>
            
            <li class="nav-item  accordion">
            <a class="nav-link text-white" href="#!" role="button" data-toggle="collapse" data-target="#drop-menu" aria-expanded="false" aria-controls="drop-menu">Profile</a>
                <div id="drop-menu" class="drop-menu collapse">
                    <form action="{{ url('/sessions/'.auth()->user()->id) }}" method="POST">
                    @csrf {{ csrf_field() }} @method('DELETE')
                        <x-form.button class='link'>Logout</x-form.button>
                    </form>
                    <a class="d-block " href="category.html">Change Password</a>

                </div>
                
            </li>
        </ul>
    </div>
    <!-- end of navbar -->

    <ul class="list-inline nml-2">
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover pr-2">
                <span class="fab fa-twitter"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-facebook-f"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-instagram"></span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-linkedin-in"></span>
            </a>
        </li>
    </ul>
    <!-- end of social-links -->
</div></aside>
<!-- end of sidenav -->

