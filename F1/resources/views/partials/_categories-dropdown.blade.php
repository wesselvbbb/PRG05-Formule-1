<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <label for="category_id">Categories</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
</div>
