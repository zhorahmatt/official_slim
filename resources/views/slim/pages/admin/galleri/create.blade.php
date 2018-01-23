@extends('slim.layouts.admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Dashboard
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                    <h3 class="box-title">General Elements</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <form role="form" action="{{ URL('/slim/admin/galleri/simpan') }}" method="post">
                        {{ csrf_field() }}
                        <!-- text input -->
                        <div class="form-group">
                            <label>Image Title</label>
                            <input type="text" class="form-control" placeholder="Image Title" name="image_title">
                        </div>

                        <!-- textarea -->
                        <div class="form-group">
                            <label for="image_description">Image Decription</label>
                            <textarea class="form-control" rows="3" placeholder="Image Description" name="image_description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image_url">Image Source</label>
                            <input type="file" name="image_url" id="image_url">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->
@endsection