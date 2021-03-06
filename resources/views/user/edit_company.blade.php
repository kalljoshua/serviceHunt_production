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
                                                                                name="sub_category_id" id="subcategory_id" required>
                                                                            <option selected value="{{$company->sub_category->id}}">
                                                                                {{$company->sub_category->name}}</option>
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
                                                                               list="districts" value="{{$company->district}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">Telephone</label>
                                                                        <input class="form-control" id="property-title" type="text"
                                                                               name="telephone" value="{{$company->telephone}}">
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
                                                                               value="{{$company->email}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">Website</label>
                                                                        <input class="form-control" type="text" name="website"
                                                                               value="{{$company->website}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">Facebook Link</label>
                                                                        <input class="form-control" id="property-title" type="text"
                                                                               name="facebook" value="{{$company->facebook}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="property-title">Twitter Link</label>
                                                                        <input class="form-control" id="property-title" type="text"
                                                                               name="twitter" value="{{$company->twitter}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Address</label>
                                                                        <textarea class="form-control" id="description" name="address"
                                                                                  rows="6">
                                                                             {{$company->address}}
                                                                        </textarea>
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
                                                                   value="{{$company->opening_time}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="description">Closing Time</label>
                                                            <input class="form-control" name="closing_time"
                                                                   value="{{$company->closing_time}}"/>
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
                                                            @if(App\Service::where('company_id',$company->id)->count()<1)
                                                                <div class="input-group">
                                                                    <input type="text" name="service[]" id="ContactNo" class="form-control"
                                                                    placeholder="Add your service">
                                                                    <span class="input-group-btn add_field_button">
                                                                    <button class="btn btn-info" type="button">+</button>
                                                               </span>
                                                                </div>
                                                                @else
                                                                @foreach(App\Service::where('company_id',$company->id)->get() as $service)
                                                                    <div class="input-group">
                                                                        <input type="text" name="service[]" id="ContactNo" class="form-control"
                                                                               value="{{$service->title}}">
                                                                        <span class="input-group-btn add_field_button">
                                                                    <button class="btn btn-info" type="button">+</button>
                                                               </span>
                                                                    </div>
                                                                @endforeach
                                                                @endif

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
                                                <?php $company_images = App\ServiceImage::where('company_id',$company->id)->get();?>
                                                @if(sizeof($company_images)>0)
                                                    <div class="row">
                                                    @foreach($company_images as $image)
                                                    <div class="col-md-2" id="product{{$image->id}}">
                                                        <div class="add-image">
                                                            <a href="#">
                                                                <img src="/images/services/our_location_370x370/{{$image->image}}" alt=""></a>

                                                        </div>
                                                        <form method="post" action="{{route('delete.image')}}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{$image->id}}" name="image_id">
                                                            <button class="btn-sm btn-danger btn-delete">Delete</button>
                                                        </form>

                                                    </div>
                                                    @endforeach
                                                    </div>
                                                    <div class="mb30" style="padding: 4px;"></div>
                                                    <div class="form-group row">
                                                    <?php for($i=1; $i<=4; $i++){?>
                                                        <div class="col-md-3">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                                </div>
                                                                <div>
													<span class="btn btn-default btn-file">
													<span class="fileinput-new">
													Select image </span>
													<span class="fileinput-exists">
													Change </span>
													<input type="file" name="image[]" placeholder="Browse Photo">
													</span>
                                                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                                        Remove </a>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix margin-top-10">
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                    </div>
                                                @else
                                                    <?php for($i=1; $i<=4; $i++){?>
                                                    <div class="form-group ">
                                                        <div class="col-md-3">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                                </div>
                                                                <div>
													<span class="btn btn-default btn-file">
													<span class="fileinput-new">
													Select image </span>
													<span class="fileinput-exists">
													Change </span>
													<input type="file" name="image[]" placeholder="Browse Photo">
													</span>
                                                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                                        Remove </a>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix margin-top-10">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }?>

                                                    @endif
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
