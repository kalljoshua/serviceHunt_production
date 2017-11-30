@extends('layouts.adminLayout')
@section('title')
    <title>Service Hunt Admin : Services</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Services
      <small>table</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">All Services</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    @include('flash::message')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">All available Services</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Owner</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                <tr>
                  <td><span class="label label-info">{{$service->created_at->format('M-d-Y')}}</span></td>
                  <td>{{ str_limit($service->title, $limit = 40, $end = '...') }}
                  </td>
                  <td>{{$service->user->first_name}}</td>
                  <td>
                  @if($service->active==1)
                  <a class="btn btn-primary btn-xs">Approved</a>
                  @else
                  <a class="btn btn-warning btn-xs">Pending</a>
                  @endif
                  </td>
                  <td class="text-right">
                    <a href="{{route('admin.service.show',['id'=>$service->id])}}" class="btn btn-info btn-xs"
                       data-toggle="tooltip"
                       data-placement="top" title="View">
                        <i class="fa fa-eye"></i></a>
                    <a href="{{route('admin.service.delete',['id'=>$service->id])}}"
                       class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top"
                       title="Delete"><i
                                class="fa fa-times"></i></a>
                </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Owner</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
