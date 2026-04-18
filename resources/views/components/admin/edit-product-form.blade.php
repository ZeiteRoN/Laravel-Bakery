<form method="POST" id="editForm" class="flex flex-col gap-2">
    @csrf
    @method('PUT')

    <div class="flex gap-2 items-center">
        <label for="editName" class="flex-1">Name</label>
        <input type="text" name="name" id="editName" class="border border-gray-400 rounded px-0.5 py-0.5">
    </div>
    <div class="flex gap-2 items-center">
        <label for="editPrice" class="flex-1">Price</label>
        <input min="0" step="any" type="number" name="price" id="editPrice" inputmode="decimal" class="border border-gray-400 rounded px-0.5 py-0.5">
    </div>
    <div class="flex gap-2 items-center">
        <label for="editWeight" class="flex-1">Weight</label>
        <input min="0" step="any" type="number" name="weight" id="editWeight" inputmode="decimal" class="border border-gray-400 rounded px-0.5 py-0.5">
    </div>
    <div class="flex gap-2 items-center">
        <label for="editHeight" class="flex-1">Height</label>
        <input min="0" step="any" type="number" name="height" id="editHeight" class="border border-gray-400 rounded px-0.5 py-0.5">
    </div>
    <div class="flex gap-2 items-center">
        <label for="editStock" class="flex-1">Stock</label>
        <input min="0" type="number" name="stock" id="editStock" class="border border-gray-400 rounded px-0.5 py-0.5">
    </div>

    <button type="submit" class="w-[75%] mx-auto px-0.5 py-0.5 border border-gray-400 rounded-xl transition-all duration-300 cursor-pointer bg-green-300 hover:bg-green-400 hover:scale-105 hover:shadow-md">Save</button>
</form>
