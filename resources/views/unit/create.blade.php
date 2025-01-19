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
                                <h3 class="card-title">Create Unit</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('units.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $unit->name ?? '') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_active">Active</label>
                                        <select class="form-control" id="is_active" name="is_active">
                                            <option value="1"
                                                {{ old('is_active', $unit->is_active ?? 1) ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="0"
                                                {{ old('is_active', $unit->is_active ?? 1) ? '' : 'selected' }}>No
                                            </option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
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
