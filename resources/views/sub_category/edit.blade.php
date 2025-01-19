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
                                <h3 class="card-title">Edit SubCategory</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form action="{{ route('sub-categories.update', $subCategory->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">SubCategory Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', $subCategory->name) }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select class="form-control" id="category_id" name="category_id" required>
                                                <option value="" disabled>Select a category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', $subCategory->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="is_active">Active</label>
                                            <select class="form-control" id="is_active" name="is_active">
                                                <option value="1"
                                                    {{ old('is_active', $subCategory->is_active) ? 'selected' : '' }}>
                                                    Yes</option>
                                                <option value="0"
                                                    {{ old('is_active', $subCategory->is_active) ? '' : 'selected' }}>No
                                                </option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
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
