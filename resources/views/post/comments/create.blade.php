
@auth
<div class="contact-form px-0"> 
    <h4 class="text-white add-letter-space mb-5">Leave a comment here :)</h4>
    <form action="{{ url('/comments') }}" method="POST" id="add-comment" novalidate enctype="multipart/form-data">
    @csrf 
        <input type="hidden" value="{{ $post->id }}" name="post_id">
            <div class="d-flex">
                <x-form.label>{{ auth()->user()->name }}</x-form.label>
            </div>
        <div class="form-group mb-5">
            <x-form.textarea name="content" placeholder="Comment here..." style="height:7rem" ></x-form.textarea>
        </div>
        <x-form.button>Submit</x-from.button>
    </form>
</div>
@endauth
