<div id="search-row-wrapper">
    <div class="container">
        <div class="search-inner">

            <div class="row search-bar">
                <div class="advanced-search">
                    <form class="search-form" method="get" action="{{route('users.search')}}">
                        <div class="col-md-3 col-sm-6 search-col">
                            <div class="input-group-addon search-category-container">
                                <select class="dropdown-product selectpicker"  name="subcategory">
                                    <option value="">All Sub Categories</option>
                                    @foreach(App\SubCategory::all() as $category)
                                        <option value="{{$category->id}}"> {{$category->name}}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 search-col">
                            <div class="input-group-addon search-category-container">
                                <input class="form-control" type="text" name="town" list="districts"
                                        placeholder="Enter your Location">
                                <i class="fa fa-map-marker"></i>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 search-col">
                            <input class="form-control keyword" name="keyword" value=""
                                   placeholder="Enter Keyword" type="text">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="col-md-3 col-sm-6 search-col">
                            <button class="btn btn-common btn-search btn-block"><strong>Search</strong></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Search box -->

        </div>
    </div>
</div>
