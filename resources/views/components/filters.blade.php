<div>
    <h1>Filters</h1>
    <form action="" class="flex flex-col gap-4">
        <input type="text" name="search" placeholder="Search" value="{{request('search')}}">
        <select name="category" id="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <input type="text" name="min_price" placeholder="Min Price">
        <input type="text" name="max_price" placeholder="Max Price">
        <button class="border border-gray-300 rounded hover:scale-105 transition-xl duration-200 hover:bg-gray-50" type="submit">Search</button>
    </form>
</div>
