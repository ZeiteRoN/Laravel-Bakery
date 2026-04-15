<form method="POST" id="editForm" class="flex flex-col gap-2">
    @csrf
    @method('PUT')

    <input type="text" name="name" id="editName">
    <input type="number" name="price" id="editPrice">

    <button type="submit">Save</button>
</form>
