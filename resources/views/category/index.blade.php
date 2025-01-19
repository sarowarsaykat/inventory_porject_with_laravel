<!DOCTYPE html>
<html>

<head>
   @include('shard.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        
        @include('shard.navber')
        @include('shard.sidebar')
       
        <!-- body start-->
        <div class="content-wrapper">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add Category</a>
                                    <table class="table table-bordered"  id="myTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Active</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->is_active ? 'Yes' : 'No' }}</td>
                                                    <td>
                                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- body end-->

        @include('shard.footer')
        
    </div>

    @include('shard.style')
</body>

</html>
