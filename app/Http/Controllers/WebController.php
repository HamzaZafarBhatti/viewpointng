<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Social;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\File;

class WebController extends Controller
{
    //
    public function review()
    {
        $data['title']='Reviews';
        $data['review'] = Review::latest()->get();
        return view('admin.web-control.review', $data);
    }
    
    public function CreateReview(Request $request)
    {
        $data['name'] = $request->name;
        $data['occupation'] = $request->occupation;
        $data['review'] = $request->review;
        if($request->hasFile('image5')){
            $image = $request->file('image');
            $filename = 'review_'.time().'.jpg';
            $location = 'asset/review/' . $filename;
            Image::make($image)->save($location);
            $data['image_link'] = $filename;
        }
        $data['status'] = 1;
        $res = Review::create($data);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating Review');
        }
    } 
    
    public function EditReview($id)
    {
        $data['title']='Reviews';
        $data['val'] = Review::find($id);
        return view('admin.web-control.review-edit', $data);
    }   
    
    public function UpdateReview(Request $request)
    {
        $data = Review::find($request->id);
        $data['name'] = $request->name;
        $data['occupation'] = $request->occupation;
        $data['review'] = $request->review;
        if($request->hasFile('update')){
            $image = $request->file('update');
            $filename = 'update_'.time().'.jpg';
            $location = 'asset/review/' . $filename;
            $path = './asset/review/';
            File::delete($path.$data->image_link);
            Image::make($image)->save($location);
            $data['image_link'] = $filename;
        }
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating Review');
        }
    }

    public function unreview($id)
    {
        $page=Review::find($id);
        $page->status=0;
        $page->save();
        return back()->with('success', 'Review has been unpublished.');
    } 
    public function preview($id)
    {
        $page=Review::find($id);
        $page->status=1;
        $page->save();
        return back()->with('success', 'Review was successfully published.');
    }
    public function DestroyReview($id)
    {
        $data = Review::find($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Review was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Review');
        }
    } 

    public function terms()
    {
        $data['title']='Terms & Conditions';
        $data['value'] = About::first();
        return view('admin.web-control.terms', $data);
    }
    
    public function UpdateTerms(Request $request)
    {
        $mac = About::find(1);
        if($mac) {
            $mac['terms'] = $request->details;
            $res = $mac->save();
        } else {
            $res = About::create(['terms' => $request->details]);
        }
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating link');
        }
    }
    
    public function privacypolicy()
    {
        $data['title']='Privacy policy';
        $data['value'] = About::first();
        return view('admin.web-control.privacy-policy', $data);
    }
    public function UpdatePrivacy(Request $request)
    {
        $mac = About::find(1);
        if($mac) {
            $mac['privacy_policy'] = $request->details;
            $res = $mac->save();
        } else {
            $res = About::create(['privacy_policy' => $request->details]);
        }
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating link');
        }
    }
    public function aboutus()
    {
        $data['title']='About us';
        $data['value'] = About::first();
        return view('admin.web-control.about-us', $data);
    } 
    
    public function UpdateAbout(Request $request)
    {
        $mac = About::find(1);
        if($mac) {
            $mac['about'] = $request->details;
            $res = $mac->save();
        } else {
            $res = About::create(['about' => $request->details]);
        }
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating link');
        }
    } 
    public function faq()
    {
        $data['title']='Frequently asked questions';
        $data['faq'] = Faq::latest()->get();
        return view('admin.web-control.faq', $data);
    } 

    public function CreateFaq(Request $request)
    {
        $data['question'] = $request->question;
        $data['answer'] = $request->answer;
        $res = Faq::create($data);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Faq');
        }
    }   

    public function DestroyFaq($id)
    {
        $data = Faq::find($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Faq was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Faq');
        }
    } 

    public function UpdateFaq(Request $request)
    {
        $mac = Faq::find($request->id);
        $mac['question'] = $request->question;
        $mac['answer'] = $request->answer;
        $res = $mac->save();
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Faq');
        }
    } 
    public function sociallinks()
    {
        $data['title']='Social links';
        $data['links'] = Social::latest()->get();
        return view('admin.web-control.social-links', $data);
    } 
    public function UpdateSocial(Request $request)
    {
        $mac = Social::find($request->id);
        $mac['value'] = $request->link;
        $res = $mac->save();
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating link');
        }
    } 
}
