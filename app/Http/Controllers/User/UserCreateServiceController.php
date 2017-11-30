<?php

namespace App\Http\Controllers\User;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Category;
use App\Company;
use App\SubCategory;
use App\Type;
use App\ServiceImage;
use App\PackageSubscription;
use Input, Redirect;

class UserCreateServiceController extends Controller
{

  public function __construct()
  {
    $this->middleware('create-service');
  }


  //display the package selection page
  function showSelectPackage()
  {
    return view('user.user_select_package');
  }


  //add package to sessions and redirect to creating a service
  function addPackage(Request $request)
  {
    Session::put('package',$request->input('package_id'));
    return redirect(route('user.create.service'));
  }

  //display the new service form
  function showNewServiceForm(Request $request)
  {
    $user_id = Auth::guard('user')->id();
    $categories = Category::all();
    $sub_categories = SubCategory::all();
    $types = Type::all();
    $companies = Company::where('user_id',$user_id)->get();

    return view('user.add_new_service')
    ->with(['categories'=>$categories,'sub_categories'=>$sub_categories,'types'=>$types])
    ->with('companies',$companies);
  }

  function createService(Request $request)
  {
    ini_set('memory_limit', '256M');
    ini_set('max_execution_time', 600);
    $user_id = Auth::guard('user')->id();
    $service = new Service();

    $categories = Category::all();
    $sub_categories = SubCategory::all();
    $types = Type::all();

    if(Input::has('title')) $service->title = Input::get('title');
    if(Input::has('description')) $service->description = Input::get('description');
    if(Input::has('company_id')) $service->company_id = Input::get('company_id');
    if(Input::has('district')) $service->district = Input::get('district');
    if(Input::has('town')) $service->town = Input::get('town');
    if(Input::has('country')) $service->country = Input::get('country');
    if(Input::has('region')) $service->region = Input::get('region');
    if(Input::has('address')) $service->address = Input::get('address');
    $service->user_id = Auth::guard('user')->id();

    if( $request->hasFile('photo') ) {
      $imageName = $request->input('title').'.'.$request->photo->extension();

      $imageName = str_replace(' ', '_', $imageName);
      if($path = $request->photo->move(public_path().'/cache_uploads/', $imageName)){
        $service->image = $imageName;


        if($service->save())
        {
          $path = public_path().'/cache_uploads/'.$imageName;

          $this->resize_image($path,$imageName);

          flash('Service has successfully been added.')->success();
          return redirect(route('user.profile'));
        }else{
          flash('Failed to add service')->warning();
          return redirect(route('user.profile'));
        }
      }
    }else{
      flash('Please select an image')->warning();
      return redirect(route('user.create.service'));
    }

  }
  

  function showPaymentForm(Request $request)
  {
    //return Session::get('property');
    $package = Session::get('package');
    return view('user.user_make_payment')->with('package',$package);;
  }

  function addPayment()
  {
    return view('user.user_done_adding_package');
  }

  function editServiceForm(Request $request, $id)
  {
    $user_id = Auth::guard('user')->id();
    $categories = Category::all();
    $sub_categories = SubCategory::all();
    $types = Type::all();
    $companies = Company::where('user_id',$user_id)->get();

    $services = Service::find($id)->first();
    return view('user.edit_service')
    ->with(['categories'=>$categories,'sub_categories'=>$sub_categories,'types'=>$types])
    ->with('companies',$companies)
    ->with('services',$services);
  }

  function submitChanges(){
    ini_set('memory_limit', '256M');
    ini_set('max_execution_time', 600);
    $user_id = Auth::guard('user')->id();

    if(Input::has('id')) $id = Input::get('id');
    $service = Service::find($id);


    if(Input::has('title')) $service->title = Input::get('title');
    if(Input::has('description')) $service->description = Input::get('description');
    if(Input::has('company_id')) $service->company_id = Input::get('company_id');
    if(Input::has('district')) $service->district = Input::get('district');
    if(Input::has('town')) $service->town = Input::get('town');
    if(Input::has('country')) $service->country = Input::get('country');
    if(Input::has('region')) $service->region = Input::get('region');
    if(Input::has('address')) $service->address = Input::get('address');
    $service->user_id = Auth::guard('user')->id();

        if($service->save())
        {

          flash('Service has successfully been Updated.')->success();
          return redirect(route('user.profile'));
        }else{
          flash('Failed to update service')->danger();
          return redirect(route('user.profile'));
        }

  }

  function deleteService(Request $request, $id)
  {
    $user = Auth::guard('user')->id();
    if(Service::destroy($id)){
      flash('Service deleted successfully')->success();
      return redirect(route('user.myads', ['user_id' => $user]));
    }else {
      flash('Failed to delete service')->success();
      return redirect(route('user.myads', ['user_id' => $user]));
    }

  }

  function resize_image($image, $photoName)
  {
    ini_set('memory_limit', '256M');
    ini_set('max_execution_time', 600);

    $image_path = $image;

    Image::make($image_path)
    ->resize(99, 99)
    ->save(public_path() . '/images/services/bottom_slider_99x99/' . $photoName);

    Image::make($image_path)
    ->resize(370, 202)
    ->save(public_path() . '/images/services/featured_slider_370x202/' . $photoName);

    Image::make($image_path)
    ->resize(355, 240)
    ->save(public_path() . '/images/services/latest_home_and_best_services_355x240/' . $photoName);

    Image::make($image_path)
    ->resize(50, 50)
    ->save(public_path() . '/images/services/latest_reviews_50x50/' . $photoName);

    Image::make($image_path)
    ->resize(100, 75)
    ->save(public_path() . '/images/services/others_100x75/' . $photoName);

    Image::make($image_path)
    ->resize(370, 370)
    ->save(public_path() . '/images/services/our_location_370x370/' . $photoName);

    Image::make($image_path)
    ->resize(770, 370)
    ->save(public_path() . '/images/services/our_location_770x370/' . $photoName);

    Image::make($image_path)
    ->resize(2000, 440)
    ->save(public_path() . '/images/services/parallax_banner_2000x1440/' . $photoName);

    Image::make($image_path)
    ->resize(364, 244)
    ->save(public_path() . '/images/services/service_listing_364x244/' . $photoName);

    Image::make($image_path)
    ->resize(1170, 600)
    ->save(public_path() . '/images/services/single_service_1170x600/' . $photoName);

    Image::make($image_path)
    ->resize(1423, 603)
    ->save(public_path() . '/images/services/banner_1423x603/' . $photoName);

    Image::make($image_path)
    ->resize(150, 110)
    ->save(public_path() . '/images/services/user_services_150x110/' . $photoName);

    Image::make($image_path)
    ->resize(120, 120)
    ->save(public_path() . '/images/services/user_services_120x120/' . $photoName);


    /*if (File::exists($image_path))
    {
    echo "Yup. It exists.";
  }*/

  /*if (!unlink($image_path))
  {
  echo ("Error deleting image_path");
}
else
{
echo ("Deleted image_path");
}*/
}

public function trythis($id){
  return "Howdy de!";
}
public function multi_upload_form()
{
  return view('agents.add_multi_images');
}

public function upld(Request $request)
{
  $tempFile = $_FILES['photo']['tmp_name'];
  $res = array();
  $res["tempFile"] = $tempFile;
  //echo json_encode($resp);


  if (!empty($_FILES)) {

    $file_names = array();
    $i = 0;

    $tempFile = $_FILES['photo']['tmp_name'];

    foreach ($tempFile as $key => $tmp_name) {
      $file_name = $key . $_FILES['photo']['name'][$key];
      $file_size = $_FILES['photo']['size'][$key];
      $file_tmp = $_FILES['photo']['tmp_name'][$key];
      $file_type = $_FILES['photo']['type'][$key];

      $formatted_name = time() . $file_name;

      $file_names[$i] = $formatted_name;

      move_uploaded_file($file_tmp, public_path() . '/cache_uploads/' . $formatted_name);

      $i++;
    }

    Session::put('service_photos', $file_names);

    $res['files'] = $file_names;

    echo json_encode($res);       //3

  }
}

public function post_upload()
{

  $input = Input::all();
  $rules = array(
    'file' => 'image|max:3000',
  );

  $validation = Validator::make($input, $rules);

  if ($validation->fails()) {
    return Response::make($validation->errors->first(), 400);
  }

  $file = Input::file('file');

  $extension = File::extension($file['name']);
  $directory = path('public') . 'uploads/' . sha1(time());
  $filename = sha1(time() . time()) . ".{$extension}";

  $upload_success = Input::upload('file', $directory, $filename);

  if ($upload_success) {
    return Response::json('success', 200);
  } else {
    return Response::json('error', 400);
  }
}


}
