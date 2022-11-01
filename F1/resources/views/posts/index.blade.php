@extends('posts.layout')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card"  style="width: 60vw;">
                    <div class="card-header">
                        <h2>Posts</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/post/create') }}" class="btn btn-success btn-sm" title="Add New Post">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    @can('admin-only')
                                        <th>Active</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->content }}</td>
                                        @can('admin-only')
                                            <td>
                                                <label>
                                                    <input data-id="{{$post->id}}" class="toggle-class" type="checkbox"
                                                           data-onstyle="success"
                                                           data-offstyle="warning" data-toggle="toggle" data-on="Show ."
                                                           data-off="Hide" {{ $post->is_active ? 'checked' : '' }}>
                                                </label>
                                            </td>
                                        @endcan
                                        <td>
                                            <a href="{{ url('/post/' . $post->id) }}" title="View Post">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                                       aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                            @can('admin-only')
                                                <a href="{{ url('/post/' . $post->id . '/edit') }}" title="Edit Post">
                                                    <button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                    </button>
                                                </a>


                                                <form method="POST" action="{{ url('/post' . '/' . $post->id) }}"
                                                      accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Post"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $posts->links('pagination::bootstrap-4')  }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#posts_table").DataTable()
        });

        $(function () {
            $('.toggle-class').change(function () {
                var is_active = $(this).prop('checked') === true ? 1 : 0;
                var post_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeActive',
                    data: {'is_active': is_active, 'post_id': post_id},
                    success: function (data) {
                        console.log(data.success)
                    }
                });
            });
        });
    </script>
@endsection
