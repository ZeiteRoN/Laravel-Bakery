<form method="POST" id="deleteForm" class="flex flex-col gap-2">
    @csrf
    @method('DELETE')

    <h1 id="productName"></h1>
    <p>Delete this product?</p>

    <button type="submit">Delete</button>
</form>
