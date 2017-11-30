<?php

namespace App\Http\Controllers\User;

use App\Service;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Input, Redirect;
use App\Category;
use App\Company;
use App\Type;
use App\Review;
use App\PackageSubscription;

class CompanyController extends Controller
{
    //
    public function newCompany()
    {
      # code...
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $types = Type::all();
      return view('user.add_company')
          ->with(['categories'=>$categories,'sub_categories'=>$sub_categories,'types'=>$types]);
    }

    function companyDetails($name)
    {
        //return "am here";
        $company = Company::where('slug',$name)->first();
        $company->increment('views');
        $reviews = Review::where('company_id',$company->id);
        //return $reviews->user;
        return view('user.company_details')
            ->with('company',$company);
            //->with('user',$user);
    }

    public function getCategory($id)
    {
        # code...
        //return "i reach here";
        //$categories = Category::where('id',$id)->first();
        $companies = Company::where('sub_category_id',$id)->where('active',1)->paginate(5);
        //return $categories->id;
        return view("user.get_category")
            ->with('services',$companies);
            //->with('categories',$categories);
    }

    function companyEdit($name)
    {
        $company = Company::where('slug',$name)->first();
        //return $company->sub_category;
        //$user_id = Auth::guard('user')->id();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $types = Type::all();
        return view('user.edit_company')
            ->with('company',$company)
            ->with('types',$types)
            ->with('categories',$categories)
            ->with('sub_categories',$sub_categories);
    }

    function submitEdit()
    {
        if(Input::has('id')) $id = Input::get('id');
        $company = Company::find($id);


        if(Input::has('name')) $company->name = Input::get('name');
        if(Input::has('description')) $company->description = Input::get('description');
        if(Input::has('district')) $company->district = Input::get('district');
        if(Input::has('telephone')) $company->telephone = Input::get('telephone');
        if(Input::has('email')) $company->email = Input::get('email');
        if(Input::has('type_id')) $company->type_id = Input::get('type_id');
        if(Input::has('company_id')) $company->company_id = Input::get('company_id');
        if(Input::has('sub_category_id')) $company->sub_category_id = Input::get('sub_category_id');
        if(Input::has('website')) $company->website = Input::get('website');
        if(Input::has('facebook')) $company->facebook = Input::get('facebook');
        if(Input::has('twitter')) $company->twitter = Input::get('twitter');
        if(Input::has('address')) $company->address = Input::get('address');
        if(Input::has('opening_time')) $company->opening_time = Input::get('opening_time');
        if(Input::has('closing_time')) $company->closing_time = Input::get('closing_time');
        $company->slug = str_replace(' ', '-',str_replace('.',' ',str_replace('/',' ',addslashes(Input::get('name')))));

        if($company->save())
        {
            flash('Company has successfully been updated.')->success();
            return redirect(route('user.profile'));
        }else{
            flash('Failed to update Company.')->warning();
            return redirect(route('user.profile'));
        }
    }

    public function postCompany(Request $request)
    {
        $services = array_filter($request->service);
       /* foreach ($services as $company_service) {
            echo $company_service. '<br/>';

        }
        exit;*/
        //return $arra;
      ini_set('memory_limit', '256M');
      ini_set('max_execution_time', 600);
        $user_id = Auth::guard('user')->id();
        $packages = PackageSubscription::where('user_id',$user_id)->first();

      $company = new Company();
      $service = new Service();


      $company->user_id = Auth::guard('user')->id();
      if(Input::has('name')) $company->name = Input::get('name');
      if(Input::has('description')) $company->description = Input::get('description');
      if(Input::has('district')) $company->district = Input::get('district');
      if(Input::has('telephone')) $company->telephone = Input::get('telephone');
      if(Input::has('type_id')) $company->type_id = Input::get('type_id');
      if(Input::has('sub_category_id')) $company->sub_category_id = Input::get('sub_category_id');
      if(Input::has('email')) $company->email = Input::get('email');
      if(Input::has('website')) $company->website = Input::get('website');
      if(Input::has('facebook')) $company->facebook = Input::get('facebook');
      if(Input::has('twitter')) $company->twitter = Input::get('twitter');
      if(Input::has('address')) $company->address = Input::get('address');
      if(Input::has('opening_time')) $company->opening_time = Input::get('opening_time');
      if(Input::has('closing_time')) $company->closing_time = Input::get('closing_time');
      $company->slug = str_replace(' ', '-',str_replace('.',' ',str_replace('/',' ',addslashes(Input::get('name')))));
      $company->package_id = 1;

        if( $request->hasFile('photo') ) {
            $imageName = $request->input('name').'.'.$request->photo->extension();

            $imageName = str_replace(' ', '_', $imageName);
            if($path = $request->photo->move(public_path().'/cache_uploads/', $imageName)){
                $company->image = $imageName;


                if($company->save())
                {
                    $path = public_path().'/cache_uploads/'.$imageName;

                    $this->resize_image($path,$imageName);

                    foreach ($services as $cs) {
                        $s = new Service();
                        //$service = new Service(['title',$company_service]);
                        $s->title = $cs;
                        $s->user_id = Auth::guard('user')->id();
                        $s->company_id = $insertedId = $company->id;

                        $s->save();
                    }


                    flash('Company has successfully been added.')->success();
                    return redirect(route('user.profile'));
                }else{
                    flash('Failed to add company')->warning();
                    return redirect(route('user.profile'));
                }
            }
        }else{
            flash('Please select an image')->warning();
            return redirect(route('company.create'));
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
}
