<div>
    <h1>Filters</h1>
    <form action="{{ route('product.index') }}" class="flex flex-col gap-4">
        <input type="text" name="search" placeholder="Search" value="{{request('search')}}">
        <select name="category" id="category">
            <option value="" selected>Everything</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                        @if((request('category') instanceof \App\Models\Category ? request('category')->id : request('category')) == $category->id || ($filters['category'] ?? null) == $category->id) selected @endif>
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        <input type="text" name="min_price" placeholder="Min Price" value="{{request('min_price')}}">
        <input type="text" name="max_price" placeholder="Max Price" value="{{request('max_price')}}">
        <button class="border bg-green-200 border-gray-100 rounded hover:scale-105 transition-xl
         duration-200 hover:bg-green-300" type="submit">
            Search
        </button>
        <a class="border text-center bg-red-200 border-gray-100 rounded hover:scale-105 transition-xl
         duration-200 hover:bg-red-300 hover:cursor-pointer"
           type="reset" href="{{route('product.index')}}">
            Reset
        </a>
    </form>
</div>
