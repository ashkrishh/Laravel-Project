<x-layout>
    <div class="row">
        <div class="col-md-10">
            <div class="contact-form bg-dark">
                <h1 class="text-white add-letter-space mb-5">Edit Post</h1>
                <form action='{{ url("posts/$post->id") }}' method="POST" id="update-post" novalidate enctype="multipart/form-data">
                @csrf @method('PATCH')
                    <!--input -->
                    <div class="form-group mb-5">
                        <x-form.label> Title </x-form.label>
                        <x-form.input name="title" value="{{ $post->title }}" />
                    </div>
                    <div class="form-group mb-5">
                        <x-form.label> Content </x-form.label>
                        <x-form.textarea name="content" placeholder="Type content of the post here..."  value="{!! $post->content !!}"/> 
                    </div>
                    <div class="form-group mb-5">
                        <x-form.label> Image </x-form.label>
                        <x-form.file name="image"/>
                    </div>
                    <div class="form-group mb-5">
                        <x-form.label name="Publish Date"> Publish Date </x-form.label>
                        <x-form.calender name="publish_date"  value="{{ $post->publish_date }}"/> 
                    </div>
                    <!-- <div class="form-group mb-5">
                        <x-form.label name="Jira Status"> Need to create a ticket in Jira ? </x-form.label>
                        <x-form.checkbox name="in_jira"  checked="{{ $post->in_jira ? 'checked' : ''}}"/> 
                    </div> -->
                    <div class="form-group mb-5">
                        <x-form.label name="Post Status"> Do you want to change the post status ? </x-form.label>
                        <div class = "d-flex"><x-form.label> Active </x-form.label> <x-form.radio name="status" value="active" checked="{{ $post->status  == 'active' ? 'checked' : ''}}"/> </div>
                        <div class = "d-flex"><x-form.label> Inactive </x-form.label> <x-form.radio name="status" value="inactive" checked="{{ $post->status == 'inactive' ? 'checked' : ''}}"/> </div>
                    </div>
                    <!-- Form submit button -->
                    <x-form.button>Update Post</x-form.button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
@include('post.scripts.calender');
