@extends('layouts.adminLayout')
@section('title')
    <title>Confirm</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Confirm
      <small>Category Deletion</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Confirm</a></li>
      <li class="active">Delete Category</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    @include('flash::message')
    <div class="row">
<!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p style="text-align: center;">Are you sure you want to delete this Category?</p>
                                <table class="table" >
                                    <tr>
                                        <td>
                                             {{$category->name}}
                                        </td>
                                        <td>
                                          <a href="{{route('admin.all.categories')}}"><button class="btn btn-default">Cancel</button></a>
                                            <a href="#"
                                               onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();" class="btn btn-danger">Delete</a>

                                            <form id="delete-form" action="{{ route('admin.category.destroy') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$category->id}}" name="id">
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- /st-content-inner -->

    </div>
    <!-- /st-content -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
