@extends('...layouts.userLayout')
@section('title')
    <title>Service Hunt : Edit Company</title>
@endsection
@section('content')
    <link rel="stylesheet" href="/css/wizard.css" type="text/css">
    @include('user.search')
    <section id="content">
        <div class="container">
            @include('flash::message')
            <div class="row">
                <div class="col-sm-12 col-md-11 col-md-offset-1">
                    <h2 class="title-2">Edit {{$company->name}}</h2>
                    <div class="page-ads box">
                            <section>
                                <div class="wizard">
                                    <div class="wizard-inner">
                                        <div class="connecting-line"></div>
                                        <ul class="nav nav-tabs" role="tablist" style="background-color: white;">

                                            <li role="presentation" class="active">
                                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                                   title="Service Info">
                            <span class="round-tab">
                                <i class="fa fa-info-circle"></i>
                            </span>
                                                </a>
                                            </li>

                                            <li role="presentation" class="disabled">
                                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                                   title="Step 2">
                            <span class="round-tab">
                                <i class="fa fa-map-marker"></i>
                            </span>
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"
                                                   title="Step 3">
                            <span class="round-tab">
                                <i class="fa fa-picture-o"></i>
                            </span>
                                                </a>
                                            </li>

                                            <li role="presentation" class="disabled">
                                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab"
                                                   title="Complete">
                            <span class="round-tab">
                                <i class="fa fa-credit-card-alt"></i>
                            </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <form action="{{route('company.edit.submit')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="tab-content">
                                            <div class="tab-pane active" role="tabpanel" id="step1">
                                                <h2 class="title-2">Company name and Description</h2>
                                                <div class="add-tab-content form-group mb30 clearfix">
                                                    <div class="form-group mb30">
                                                        <label class="control-label">Company name</label>
                                                        <input class="form-control input-md" name="name"
                                                               value="{{$company->name}}"
                                                               required="" type="text">
                                                        <input type="hidden" value="{{$company->id}}" name="id">
                                                    </div>
                                                    <div class="form-group mb30">
                                                        <label class="control-label" for="textarea">Describe ad</label>
                                                        <textarea class="form-control" id="textarea" name="description"
                                                                  rows="4">{{$company->description}}</textarea>
                                                    </div>
                                                </div>

                                                <h2 class="title-2">Types and Categories</h2>
                                                <div class="form-group mb30 clearfix">
                                                    <div class="add-tab-content">
                                                        <div class="add-tab-row push-padding-bottom">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-type">Type</label>
                                                                        <select class="form-control"
                                                                                title="Select"
                                                                                name="type_id" required>
                                                                            @foreach($types as $type)
                                                                                <option value="{{$type->id}}"
                                                                                        @if($company->type->id == $type->id)
                                                                                        selected="selected" @endif>{{$type->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-type">Category</label>
                                                                        <select class="form-control" title="Select"
                                                                                id="property-type"
                                                                                name="category_id" required>
                                                                            @foreach($categories as $categories)
                                                                                <option value="{{$categories->id}}"
                                                                                        @if($company->sub_category->category->id == $categories->id)
                                                                                        selected="selected" @endif>
                                                                                    {{$categories->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-type">Sub-Category</label>
                                                                        <select class="form-control"
                                                                                name="sub_category_id" required>
                                                                            @foreach($sub_categories as $sub_categories)
                                                                                <option value="{{$sub_categories->id}}"
                                                                                        @if($company->sub_category->id == $sub_categories->id)
                                                                                        selected="selected" @endif >
                                                                                    {{$sub_categories->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <ul class="list-inline pull-right">
                                                    <li>
                                                        <button type="button" class="btn btn-primary next-step">Save and
                                                            continue
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step2">
                                                <h2 class="title-2">Contact and Location/Address</h2>
                                                <div class="form-group mb30 clearfix">
                                                    <div class="add-tab-content">
                                                        <div class="add-tab-row push-padding-bottom">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">District</label>
                                                                        <input class="form-control" type="text" name="district"
                                                                               list="districts" placeholder="Enter your District">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">Telephone</label>
                                                                        <input class="form-control" id="property-title" type="text"
                                                                               name="telephone" placeholder="Enter your Telephone number">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="add-tab-row push-padding-bottom">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">Email Address</label>
                                                                        <input class="form-control" type="text" name="email"
                                                                               placeholder="Enter your company Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">Website</label>
                                                                        <input class="form-control" type="text" name="website"
                                                                               placeholder="Enter your Website URL http://website.com">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">Facebook Link</label>
                                                                        <input class="form-control" id="property-title" type="text"
                                                                               name="facebook" placeholder="Enter your Facebook Link">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">Twitter Link</label>
                                                                        <input class="form-control" id="property-title" type="text"
                                                                               name="twitter" placeholder="Enter your Twitter Link">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Address</label>
                                                                        <textarea class="form-control" id="description" name="address"
                                                                                  rows="6"
                                                                                  placeholder="Enter your business Address"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 class="title-2">Working Hours</h2>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="description">Opening Time</label>
                                                            <input class="form-control" name="opening_time"
                                                                   placeholder="Enter your business Opening time"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="description">Closing Time</label>
                                                            <input class="form-control" name="closing_time"
                                                                   placeholder="Enter your business Closing Time"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="list-inline pull-right">
                                                    <li>
                                                        <button type="button" class="btn btn-warning prev-step">Previous
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="btn btn-primary next-step">Save and
                                                            continue
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step3">
                                                <h2 class="title-2">Services offered</h2>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="description">Services</label>
                                                            <div class="input-group">
                                                                <input type="text" name="service[]" id="ContactNo" class="form-control"
                                                                       placeholder="Enter a Service">
                                                                <span class="input-group-btn add_field_button">
                                                                    <button class="btn btn-info" type="button">+</button>
                                                               </span>
                                                            </div>
                                                            <div class="input_fields_wrap">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb30"></div>
                                                <ul class="list-inline pull-right">
                                                    <li>
                                                        <button type="button" class="btn btn-warning prev-step">Previous
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button"
                                                                class="btn btn-primary btn-info-full next-step">Save and
                                                            continue
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="complete">
                                                <h2 class="title-2">Add Images to Your Ad</h2>
                                                <div class="col-sm-3">
                                                    <div id="wrapper">
                                                        <input type="file" name="photo" accept="image/*"
                                                               onchange="preview_image(event)">
                                                        <img id="output_image"/>
                                                    </div>
                                                </div>
                                                <div class="mb30"></div>

                                                <ul class="list-inline pull-right">
                                                    <li>
                                                        <button type="button" class="btn btn-warning prev-step">Previous
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="submit"
                                                                class="btn btn-primary btn-info-full next-step">Complete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                </div>
            </div>
        </div>
        </div>
    </section>
    @endsection
