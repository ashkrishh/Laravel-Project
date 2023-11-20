<x-layout>
    <div class="container py-4 my-5">
        <div class="row justify-content-between">
            <div class="col-lg-10">
                <img class="img-fluid" src='{{asset("storage/$post->image")}}' alt="">
                <h1 class="text-white add-letter-space mt-4">{{ $post->title }}</h1>
                <ul class="post-meta mt-3 mb-4">
                    <li class="d-inline-block mr-3">
                        <span class="fas fa-clock text-primary"></span>
                        <a class="ml-1" href="#">{{ $post->publish_date }}</a>
                    </li>
                    <li class="d-inline-block">
                        <span class="fas fa-list-alt text-primary"></span>
                        <a class="ml-1" href="#">{{ $post->user->name }}</a>
                    </li>
                </ul>

                <p>{{ $post->content }}</p>
            
                <div class="widget mt-5">
                    <a class='show-comments'> Show all comments </a><img src="images/arrow-right.png" alt="">
                    <div style="display: none;" class='comments blockquote bg-dark my-5'>
                        @include('post.comments.show',['comments' => $post->comments, 'post_id' => $post->id])
                    </div>
                </div>
       
                @include('post.comments.create')
                <x-form.anchor class='' href='/posts'> Back </x-form.anchor>
            </div>
        </div>
    </div>
    @include('post.scripts.general');
</x-layout>
    
