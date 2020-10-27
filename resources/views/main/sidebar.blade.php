<div class="list-group mt-2">
    <button type="button" class="list-group-item list-group-item-action bg-dark disabled text-white">
        Category
    </button>
    @foreach($categories as $category)
        <a href="{{ route('category.show', $category->slug) }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $category->name }}</h5>
                <span class="count">{{ $category->posts->count() }}</span>
            </div>
        </a>
    @endforeach
</div>
