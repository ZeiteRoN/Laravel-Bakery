<form method="POST" id="editForm" class="flex flex-col gap-2">
    @csrf
    @method('PUT')

    <div class="edit-field-container">
        <label for="editName">Name</label>
        <input type="text" name="name" id="editName">
    </div>
    <div class="edit-field-container">
        <label for="editPrice">Price</label>
        <input min="0" step="any" type="number" name="price" id="editPrice">
    </div>
    <div class="edit-field-container">
        <label for="editWeight">Weight</label>
        <input min="0" step="any" type="number" name="weight" id="editWeight">
    </div>
    <div class="edit-field-container">
        <label for="editHeight">Height</label>
        <input min="0" step="any" type="number" name="height" id="editHeight"></div>
    <div class="edit-field-container">
        <label for="editStock">Stock</label>
        <input min="0" type="number" name="stock" id="editStock">
    </div>

    <button class="edit-button" type="submit">Save</button>
</form>
