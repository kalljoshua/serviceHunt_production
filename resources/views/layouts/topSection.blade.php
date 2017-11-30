<!-- Start intro section -->
<section id="intro" class="section-intro">
  <div class="overlay">
    <div class="container">
      <div class="main-text">
        <h1 class="intro-title">Welcome To <span style="color:blue">Service</span> <span style="color:red">Hunt</span></h1>
        <p class="sub-title">Search, Sell and Rate Services Online</p>

        <!-- Start Search box -->
          <div class="row search-bar">
              <div class="advanced-search">
                  <form class="search-form" method="get">
                      <div class="col-md-3 col-sm-6 search-col">
                          <div class="input-group-addon search-category-container">
                              <select class="dropdown-product selectpicker" name="subcategory" >
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
                              <input class="form-control" type="text" name="town" list="cities" placeholder="Enter your Location">
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
</section>
<!-- end intro section -->
