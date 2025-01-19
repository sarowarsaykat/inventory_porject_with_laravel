<!DOCTYPE html>
<html>

<head>
   @include('shard.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        
        @include('shard.navber')
        @include('shard.sidebar')
       
        <!-- form start-->
        <div class="content-wrapper">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Manufacturers</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <a href="{{ route('manufacturer.create') }}" class="btn btn-primary mb-3">Add Manufacturer</a>
                                
                                    <table class="table table-bordered"  id="myTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Company Name</th>
                                                <th>Country</th>
                                                <th>Active</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($manufacturers as $manufacturer)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $manufacturer->company_name }}</td>
                                                    <td>{{ $manufacturer->country }}</td>
                                                    <td>{{ $manufacturer->is_active ? 'Yes' : 'No' }}</td>
                                                    <td>
                                                        <a href="{{ route('manufacturer.edit', $manufacturer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('manufacturer.destroy', $manufacturer->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No manufacturers found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- form end-->

        </div>

        @include('shard.footer')
        
       
        
    </div>
   

    @include('shard.style')
</body>

</html>
