<div class="flex flex-col gap-2 border shadow-lg p-4 max-w-60 rounded-2xl hover:scale-105 transition-all ">
    <h3>{{$review->user->name}}</h3>
    <p>{{$review->text}}</p>
    <p>{{$review->rating}}</p>
    @auth
        @if($review->user_id === auth()->id() || auth()->user()->is_admin)
            <form action="{{ route('reviews.destroy', $review) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-600 transition-colors">Delete</button>
            </form>
        @endif
    @endauth
</div>
