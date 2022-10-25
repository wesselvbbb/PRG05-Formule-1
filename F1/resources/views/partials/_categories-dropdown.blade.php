<div class="dropdown">
    <button class="btn btn-info dropdown-toggle" style="color: white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<div class="dropdown show">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown link
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        @foreach($categories as $category)
            <a class="dropdown-item" href="{{ route('home', ['category' => $category->name]) }}">{{ $category->name }}</a>
            <a class="dropdown-item" href="#">Another action</a>
        @endforeach
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</div>
