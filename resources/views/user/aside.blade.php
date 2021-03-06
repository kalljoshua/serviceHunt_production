<aside>
    <div class="inner-box">
        <div class="widget-title">
            <h4>Advertisement</h4>
        </div>
        <a href="https://ruraaraempire.com" target="_blank"><img src="/client_inc/assets//img/img1.jpg" alt=""></a>

    </div>
    <div class="inner-box">
        <div class="categories">
            <div class="widget-title">
                <i class="fa fa-align-justify"></i>
                <h4>All Categories</h4>
            </div>
            <div class="categories-list">
                <ul>
                    @foreach(App\Category::all() as $category)
                        @if($category->sub_category->count()>0)
                            <div class="category-header">
                                <a data-toggle="collapse" href="#collapsse{{$category->id}}">
                                    <i class="fa fa-tags"></i>
                                    <?php echo ucfirst(strtolower($category->name));?> <span
                                            class="category-counter">({{$category->sub_category->count()}})</span>
                                </a>
                            </div>
                            <div id="collapsse{{$category->id}}" class="category-content collapse">
                                @foreach(App\SubCategory::where('category_id', $category->id)->orderBy('created_at','DESC')->take(4)->get() as $sub_category)
                                    <li>
                                        <a href="/services/{{$sub_category->id}}/category">{{$sub_category->name}}
                                            <span class="category-counter">({{$sub_category->companies->count()}})</span></a>

                                    </li>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


</aside>