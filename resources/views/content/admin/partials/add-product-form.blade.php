<form method="POST"
      action="{{ route('product.store') }}"
      enctype="multipart/form-data"
      class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow space-y-4">

    @csrf

    <div>
        <label>Назва</label>
        <input type="text" name="name"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label>Опис</label>
        <textarea name="description"
                  class="w-full border rounded px-3 py-2"></textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label>Ціна</label>
            <input type="number" step="0.01" name="price"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Кількість</label>
            <input type="number" name="stock"
                   class="w-full border rounded px-3 py-2">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label>Вага (кг)</label>
            <input type="number" step="0.01" name="weight"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Висота (см)</label>
            <input type="number" step="0.01" name="height"
                   class="w-full border rounded px-3 py-2">
        </div>
    </div>

    <div>
        <label>Категорія</label>
        <select name="category_id"
                class="w-full border rounded px-3 py-2">
            @foreach($categories as $category)
                <option name="category_id" value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Фото</label>
        <input type="file" name="image_path"
               class="w-full">
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" value="1" checked>
        <label>Активний товар</label>
    </div>

    <button class="bg-pink-600 text-white px-6 py-2 rounded hover:bg-pink-700">
        Створити товар
    </button>

</form>
