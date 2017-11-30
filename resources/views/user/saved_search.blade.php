@extends('...layouts.userLayout')
@section('title')
<title>Service Hunt : Saved Search</title>
@endsection
@section('content')
<div id="content">
  <div class="container">
    <div class="row">
      @include('user.side_bar')
      <div class="col-sm-9 page-content">
        <div class="inner-box">
          <h2 class="title-2"><i class="fa fa-star-o"></i> Saved Search</h2>
          <br>
          <div class="table-responsive">
            <table class="table table-striped table-bordered add-manage-table">
              <tbody>
                <tr>
                  <td class="add-img-td">
                    <a href="#">
                      <img class="img-responsive" src="/client_inc/assets//img/item/img-1.jpg" alt="img">
                    </a>
                  </td>
                  <td class="ads-details-td">
                    <h4><a href="#">Brand New All about iPhones</a></h4>
                    <p> <strong> Posted On </strong>:
                      02-Oct-2017, 04:38 PM </p>
                      <p> <strong>Visitors </strong>: 221 <strong>Located In:</strong> New York </p>
                    </td>
                    <td class="price-td">
                      <strong> $199</strong>
                    </td>
                  </tr>
                  <tr>
                    <td class="add-img-td">
                      <a href="#">
                        <img class="img-responsive" src="/client_inc/assets//img/item/img-2.jpg" alt="img">
                      </a>
                    </td>
                    <td class="ads-details-td">
                      <h4><a href="#">Sony Xperia dual sim 100% brand new iPad</a></h4>
                      <p> <strong> Posted On </strong>:
                        02-Oct-2017, 04:38 PM </p>
                        <p> <strong>Visitors </strong>: 221 <strong>Located In:</strong> New York </p>
                      </td>
                      <td class="price-td">
                        <strong> $74</strong>
                      </td>
                    </tr>
                    <tr>
                      <td class="add-img-td">
                        <a href="#">
                          <img class="img-responsive" src="/client_inc/assets//img/item/img-3.jpg" alt="img">
                        </a>
                      </td>
                      <td class="ads-details-td">
                        <h4><a href="#">Digital Cameras brand new</a></h4>
                        <p> <strong> Posted On </strong>:
                          02-Oct-2017, 04:38 PM </p>
                          <p> <strong>Visitors </strong>: 221 <strong>Located In:</strong> New York </p>
                        </td>
                        <td class="price-td">
                          <strong> $49</strong>
                        </td>
                      </tr>
                      <tr>
                        <td class="add-img-td">
                          <a href="#">
                            <img class="img-responsive" src="/client_inc/assets//img/item/img-4.jpg" alt="img">
                          </a>
                        </td>
                        <td class="ads-details-td">
                          <h4><a href="#">Samsung Galaxy dual sim 100% brand new</a></h4>
                          <p> <strong> Posted On </strong>:
                            02-Oct-2017, 04:38 PM </p>
                            <p> <strong>Visitors </strong>: 221 <strong>Located In:</strong> New York </p>
                          </td>
                          <td class="price-td">
                            <strong> $149</strong>
                          </td>
                        </tr>
                        <tr>
                          <td class="add-img-td">
                            <a href="#">
                              <img class="img-responsive" src="/client_inc/assets//img/item/img-5.jpg" alt="img">
                            </a>
                          </td>
                          <td class="ads-details-td">
                            <h4><a href="#">Brand New Macbook Pro</a></h4>
                            <p><strong> Posted On </strong>: <span>02-Oct-2017, 04:38 PM </span></p>
                            <p><strong>Visitors</strong>: <span>221</span> <strong>Located In:</strong> <span>New York</span></p>
                          </td>
                          <td class="price-td">
                            <strong> $168</strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endsection
