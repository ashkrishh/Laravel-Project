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

                <div class="blockquote bg-dark my-5">
                    <p class="blockquote-text pl-2">A wise girls knows her limit to touch sky.Rpelat sapiesd praesentium adipisci.The question me an idea so asered</p>
                    <span class="blockquote-footer text-white h4 mt-3">James Hopkins</span>
                </div>
            </div>
        </div>
    </div>
</x-layout>
    
