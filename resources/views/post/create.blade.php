<x-layout>
    <div class="row">
        <div class="col-md-10">
            <div class="contact-form bg-dark">
                <h1 class="text-white add-letter-space mb-5">Write something here :)</h1>
                <form action="{{ url('posts') }}" method="POST" id="create-post" novalidate enctype="multipart/form-data">
                @csrf {{ csrf_field() }}
                    <!--input -->
                    <div class="form-group mb-5">
                        <x-form.label> Title </x-form.label>
                        <x-form.input name="title"/>
                    </div>
                    <div class="form-group mb-5">
                        <x-form.label> Content </x-form.label>
                        <x-form.textarea name="content" placeholder="Type content of the post here..." /> 
                    </div>
                    <div class="form-group mb-5">
                        <x-form.label> Image </x-form.label>
                        <x-form.file name="image"/>
                    </div>
                    <div class="form-group mb-5">
                        <x-form.label name="Publish Date"> Publish Date </x-form.label>
                        <x-form.calender name="publish_date"/> 
                    </div>
                    <div class="form-group mb-5">
                        <x-form.label name="Jira Status"> Need to create a ticket in Jira ? </x-form.label>
                        <x-form.checkbox name="in_jira"/> 
                    </div>
                    <!-- Form submit button -->
                    <x-form.button>Post It !!</x-form.button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
@include('post.scripts.calender');
