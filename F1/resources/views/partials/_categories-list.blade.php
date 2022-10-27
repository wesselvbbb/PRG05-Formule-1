@foreach($categories as $category)
    <a href="{{route ('post.index', ['category' => $category->name])}}" type="button" class="btn btn-primary">{{$category->name}}</a>
@endforeach

