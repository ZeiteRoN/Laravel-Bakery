@auth
<div class="bg-white p-6 rounded-lg shadow-sm border">
    <h3 class="text-lg font-semibold mb-4">Write a Review</h3>
    <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">


        <div>
            <label for="text" class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
            <textarea id="text" name="text" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Поділіться враженями про цей продукт!" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">Надіслати відгук</button>
    </form>
</div>
@endauth
