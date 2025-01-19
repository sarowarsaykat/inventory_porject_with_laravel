<!DOCTYPE html>
<html>

<head>
    @include('shard.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        @include('shard.navber')
        @include('shard.sidebar')

        <div class="content-wrapper">

            <!-- form start-->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Sub Category</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <a href="{{ route('sub-categories.create') }}" class="btn btn-primary mb-3">Add
                                        SubCategory</a>
                                    <table class="table table-bordered"  id="myTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>SubCategory Name</th>
                                                <th>Category</th>
                                                <th>Active</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subCategories as $subCategory)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $subCategory->name }}</td>
                                                    <td>{{ $subCategory->category->name ?? 'N/A' }}</td>
                                                    <td>{{ $subCategory->is_active ? 'Yes' : 'No' }}</td>
                                                    <td>
                                                        <a href="{{ route('sub-categories.edit', $subCategory->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form
                                                            action="{{ route('sub-categories.destroy', $subCategory->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- form end-->

        </div>

        @include('shard.footer')



    </div>


    @include('shard.script')
</body>

</html>
