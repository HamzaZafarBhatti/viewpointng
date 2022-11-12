<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\MlmPlan;
use App\Models\PaymentProof;
use App\Models\Plan;
use App\Models\Review;
use App\Models\Service;
use App\Models\Social;
use App\Models\TopEarner;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    //


    public function index()
    {
        $data['title'] = "Home";
        $users = User::latest()->take(5)->get();
        foreach ($users as $user) {
            if ($user->account_type_id == 1) {
                $plan = Plan::where('account_type_id', $user->account_type_id)->first();
            } else {
                $plan = MlmPlan::where('account_type_id', $user->account_type_id)->first();
            }
            if($plan){
                $user->plan = $plan->name;
            } else {
                $user->plan = 'N/A';
            }
        }
        $data['registrations'] = $users;
        $data['withdraws'] = Withdraw::with('user')->where('status', '1')->whereIn('type', [1, 3])->latest()->take(5)->get();
        $data['mlm_withdraws'] = Withdraw::with('user')->where('status', '1')->where('type', 2)->latest()->take(5)->get();
        // return $data['mlm_withdraws'];
        // $self_cashouts = DB::table('self_cashout_history')->whereStatus(1)->latest()->take(5)->get();
        // foreach ($self_cashouts as $cashout) {
        //     $cashout->user = User::whereId($cashout->user_id)->first();
        // }
        // $data['self_cashouts'] = $self_cashouts;
        $data['service'] = Service::all();
        $plans = collect();
        $plans->push(Plan::where('status', 1)->first());
        $plans->push(MlmPlan::where('status', 1)->first());
        // return $plans;
        $data['plans'] = $plans;
        $data['faq'] = Faq::all();
        return view('front.index', $data);
    }


    public function about()
    {
        $data['title'] = "About Us";
        $data['review'] = Review::whereStatus(1)->get();
        $data['about'] = About::first();
        return view('front.about', $data);
    }
    public function topearners()
    {
        $data['title'] = "Top Earners";
        $data['topearners'] = TopEarner::with('user')->orderBy('amount', 'DESC')->take(50)->get();
        return view('front.topearners', $data);
    }

    public function faq()
    {
        $data['title'] = "Frequently Asked Questions & Answers";
        $data['faq'] = Faq::all();
        return view('front.faq', $data);
    }

    public function terms()
    {
        $data['title'] = "Terms & conditions";
        $data['about'] = About::first();
        return view('front.terms', $data);
    }
    public function coupon()
    {
        $data['title'] = "ACTIVATION CODE VENDORS";
        $data['vendors'] = Vendor::where('status', 1)->get();
        return view('front.coupon', $data);
    }

    public function privacy()
    {
        $data['title'] = "Privacy policy";
        $data['about'] = About::first();
        return view('front.privacy', $data);
    }


    public function contact()
    {
        $data['title'] = "Contact Us";
        $data['social'] = Social::all();
        return view('front.contact', $data);
    }


    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required'
        ]);
        $sav['full_name'] = $request->name;
        $sav['email'] = $request->email;
        $sav['mobile'] = $request->mobile;
        $sav['message'] = $request->message;
        $sav['seen'] = 0;
        Contact::create($sav);
        return back()->with('success', ' Message was successfully sent!');
    }


    public function blog()
    {
        $data['title'] = "Blog Feed";
        $posts= Blog::latest()->paginate(3);
        foreach ($posts as $post) {
            $post->title_slug = Str::slug($post->title);
            $post->content_limit = Str::limit($post->content, 60);
        }
        $data['posts'] = $posts;
        return view('front.blog', $data);
    }

    public function article($id)
    {
        $post = $data['post'] = Blog::find($id);
        // $xcat = $data['xcat'] = Category::find($post->cat_id);
        $post->views += 1;
        $post->save();
        $data['title'] = $data['post']->title;
        $data['is_shared'] = false;
        if (auth()->user()) {
            $user_shared_post = Blog::whereHas('users', function ($q) {
                $q->where('users.id', auth()->user()->id);
            })->where('id', $id)->first();
            $data['is_shared'] = $user_shared_post !== null ? true : false;
        }
        return view('front.single', $data);
    }

    public function category($id)
    {
        // return $trending;
        $cat = Category::find($id);
        $data['title'] = $cat->categories;
        $data['posts'] = Blog::where('cat_id', $id)->/* where('post_date', Carbon::now()->format('Y-m-d'))-> */latest()->paginate(3);
        // return $data['posts'];
        return view('front.cat', $data);
    }

    public function page($id)
    {
        $page = $data['page'] = Page::find($id);
        $data['title'] = $page->title;
        return view('front.pages', $data);
    }


    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);
        $macCount = Subscriber::where('email', $request->email)->count();
        if ($macCount > 0) {
            return back()->with('alert', 'This Email Already Exist !!');
        } else {
            Subscriber::create($request->all());
            return back()->with('success', ' Subscribe Successfully!');
        }
    }

    public function verify_pin()
    {
        $data['title'] = "VERIFY ACTIVATION CODE";
        return view('front.verify_pin', $data);
    }

    public function do_verify_pin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => 'required',
        ]);
        // return $request;
        if ($validator->fails()) {
            // adding an extra field 'error'...
            Session::flash('error', 'Please enter the ACTIVATION PIN CODE');
            return redirect()->route('verify_pin');
        }
        $coupon = Coupon::where('serial', $request->coupon)->first();
        if (!$coupon) {
            Session::flash('error', 'ACTIVATION CODE INVALID');
            return redirect()->route('verify_pin');
        }
        
        $aff_plans = Plan::whereStatus(1)->get();
        $aff_arr = [];
        foreach($aff_plans as $plan) {
            array_push($aff_arr, $plan->account_type_id);
        }

        $mlm_plans = MlmPlan::whereStatus(1)->get();
        $mlm_arr = [];
        foreach($mlm_plans as $plan) {
            array_push($mlm_arr, $plan->account_type_id);
        }

        if ($coupon->status == 0) {
            if (in_array($coupon->account_type_id, $aff_arr)) {
                $coupon->plan = $coupon->getAffliatePlan();
            } else if (in_array($coupon->account_type_id, $mlm_arr)) {
                $coupon->plan = $coupon->getMlmPlan();
            }
            // adding an extra field 'error'...
            $user = User::with('parent')->where('coupon_id', $coupon->id)->first();
            // return $user;
            if ($user) {
                $user->coupon = $coupon;
            }
            // Session::flash('warning', 'ACTIVATION CODE is already used by user "' . $user->username . '"');
            $data['title'] = "Verify pin";
            $data['verify_pin_user'] = $user;
            // return $user;
            return view('front.verify_pin', $data);
            // return redirect()->route('verify_pin');
        } else {
            Session::flash('success', 'ACTIVATION CODE is valid and can be used');
            return redirect()->route('verify_pin');
        }
    }

    public function payment_proof()
    {
        $data['title'] = 'Payment Proof';
        $data['proofs'] = PaymentProof::with('user')->whereStatus(1)->latest()->paginate(20);
        return view('front.payment_proof', $data);
    }

    public function upload_proof()
    {
        $data['title'] = 'Upload Payment Proof';
        return view('front.upload_payment_proof', $data);
    }

    public function do_upload_proof(Request $request)
    {
        // return json_encode(auth()->user());
        if (!auth()->user()) {
            return back()->with('alert', 'Please Log in first!');
        }
        $validator = Validator::make($request->all(), [
            'caption' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $errors = $validator->errors();
            $html_err = "Error: ";
            foreach ($errors->all() as $error) {
                $html_err .=  $error . ', ';
            }
            Session::flash('alert', $html_err);
            return redirect()->route('upload.proof');
        }
        // return $request;
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'proof_' . time() . '.jpg';
            $location = 'asset/payment_proofs/' . $filename;
            Image::make($image)->save($location);
            $data['image'] = $filename;
        }
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 0;
        // return $data;
        $res = PaymentProof::create($data);
        if ($res) {
            $user = User::find(auth()->user()->id);
            $user->show_popup = 0;
            $user->save();
            return back()->with('success', 'Payment Proof uploaded Successfully!');
        } else {
            return back()->with('alert', 'Problem uploading payment proof');
        }
    }
}
