@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : Edit Service</title>
@endsection
@section('content')

@include('user.search')
<section id="content">
  <div class="container">
    @include('flash::message')
    <div class="row">
      <div class="col-sm-12 col-md-11 col-md-offset-1" >
        <h2 class="title-2">Edit {{$services->title}}</h2>
        <div class="page-ads box">
        <form action="{{route('user.edit.service.submit')}}" enctype="multipart/form-data" method="post">
                	{{ csrf_field() }}
          <h2 class="title-2">Service description and title</h2>
          <div class="add-tab-content form-group mb30 clearfix">
            <div class="form-group mb30">
              <label class="control-label">Ad title</label>
              <input class="form-control input-md" name="title" value="{{$services->title}}" required="" type="text">
              <span class="help-block">A great title needs at least 60 characters.</span>
              <input name="id" type="hidden" value="{{$services->id}}">
            </div>
            <div class="form-group mb30">
              <label class="control-label" for="textarea">Describe ad</label>
              <textarea class="form-control" id="textarea" name="description" rows="4">{{$services->description}}</textarea>
            </div>
          </div>

          

      <h2 class="title-2">Location/Address</h2>
      <div class="form-group mb30 clearfix">
        <div class="add-tab-content">
          <div class="add-tab-row push-padding-bottom">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="property-title">District</label>
                  <input class="form-control"  type="text" name="district" list="districts" value="{{$services->district}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="property-title">Town</label>
                  <input class="form-control" id="property-title" type="text" name="town" list="cities" value="{{$services->town}}">
                </div>
              </div>
            </div>
          </div>
          <div class="add-tab-row push-padding-bottom">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="property-title">Country</label>
                  <input class="form-control"  type="text" name="country" list="countries" value="{{$services->country}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="property-title">Region</label>
                  <input class="form-control" id="property-title" type="text" name="region" list="regions" value="{{$services->region}}">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="description">Address</label>
                  <textarea class="form-control" id="description" name="address" rows="6">{{$services->address}}</textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!--
      <h2 class="title-2">Add Images to Your Ad</h2>
      <div class="col-sm-12">
          <div class="form-group">
              <label for="property-title">Featuring Picture</label>
              <input type="file" name="photo" class="form-control" placeholder="Browse to select image">
          </div>
      </div>
      <p class="help-block">Add up to 4 photos. Use a real image of your product, not catalogs.</p>-->

      <div class="mb30"></div>
      <div class="account-block text-right">
        <button type="submit" id="add-service" class="btn btn-primary">Submit Property</button>
      </div>
    </form>

    </div>
</div>
</div>
</div>
</section>

@endsection
