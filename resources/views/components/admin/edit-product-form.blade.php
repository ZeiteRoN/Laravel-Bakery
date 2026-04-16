<form method="POST" id="editForm" class="flex flex-col gap-2">
    @csrf
    @method('PUT')

    <input type="text" name="name" id="editName">
    <input min="0" step="any" type="number" name="price" id="editPrice">
    <input min="0" step="any" type="number" name="weight" id="editWeight">
    <input min="0" step="any" type="number" name="height" id="editHeight">
    <input min="0" type="number" name="stock" id="editStock">

    <button type="submit">Save</button>
</form>
