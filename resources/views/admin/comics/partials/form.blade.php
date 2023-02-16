<form action="{{ route($route, $comic->id) }}" method="POST">
    @csrf
    @method($method)
    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="input-title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') ?? $comic->title }}" id="input-title">
    </div>
    <div class="mb-3">
        <label for="input-description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="input-description" cols="30" rows="10">{{ old('description') ?? $comic->title }}</textarea>
    </div>
    <div class="mb-3">
        <label for="input-cover" class="form-label">Cover</label>
        <input type="text" class="form-control" name="cover" value="{{ old('cover') ?? $comic->cover }}" id="input-cover">
    </div>
    <div class="mb-3">
        <label for="input-price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{ old('price') ?? $comic->price }}" id="input-price">
    </div>
    <div class="mb-3">
        <label for="input-series" class="form-label">Series</label>
        <input type="text" class="form-control" name="series" value="{{ old('series') ?? $comic->series }}" id="input-series">
    </div>
    <div class="mb-3">
        <label for="input-sale_date" class="form-label">Sale date</label>
        <input type="date" class="form-control" name="sale_date" value="{{ old('sale_date') ?? $comic->sale_date }}" id="input-sale_date">
    </div>
    <div class="mb-3">
        <label for="input-type" class="form-label">Type</label>
        <input type="text" class="form-control" name="type" value="{{ old('type') ?? $comic->type }}" id="input-type">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>