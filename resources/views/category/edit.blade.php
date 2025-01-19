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
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('category.update', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                            
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="is_active">Active</label>
                                        <select class="form-control" id="is_active" name="is_active">
                                            <option value="1" {{ old('is_active', $category->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ old('is_active', $category->is_active) == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                            
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
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
