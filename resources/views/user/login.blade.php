<x-layout>
    <div class="row">
        <div class="col-md-10">
            <div class="contact-form bg-dark">
                <h1 class="text-white add-letter-space mb-5">Welcome Back :)</h1>
                <form action="{{ url('sessions') }}" method="POST" id="login-user" novalidate enctype="multipart/form-data">
                @csrf {{ csrf_field() }}
                    <!--input -->
                    <div class="form-group mb-5">
                        <x-form.label> Email </x-form.label>
                        <x-form.input name="email"/>
                    </div>
                    <div class="form-group mb-5">
                        <x-form.label> Password </x-form.label>
                        <x-form.input name="password" type="password"/>
                    </div>
                    <!-- Form submit button -->
                    <x-form.button>Login <img src="images/arrow-right.png" alt=""></x-form.button> 
                </form>
            </div>
        </div>
    </div>
</x-layout>
