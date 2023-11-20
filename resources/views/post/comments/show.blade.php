@if(count($comments) > 0)
@foreach($comments as $comment)
    <div class="blockquote bg-dark my-2">
        <p class="blockquote-text pl-1">{{ $comment->content }} </p>
        <span class="blockquote-footer text-white h4 mt-3">{{ $comment->user->name }}
            <span class="small">- {{ $comment->created_at->diffForHumans()}}</span>
        </span>
    </div>
@endforeach
@endif

