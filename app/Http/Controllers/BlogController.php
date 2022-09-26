<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogUser;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    //
    // public function category()
    // {
    //     $data['title'] = 'Blog Category';
    //     $data['cat'] = Category::latest()->get();
    //     return view('admin.blog.post-category', $data);
    // }

    public function index()
    {
        $data['title'] = 'Blog';
        $data['blog'] = Blog::all();
        return view('admin.blog.index', $data);
    }
    public function create()
    {
        $data['title'] = 'Add Blog';
        // $data['category'] = Category::all();
        return view('admin.blog.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'post_date' => 'required',
                'image' => 'required | mimes:jpeg,jpg | max:1000'
            ],
            [
                'title.required' => 'Post Title Must not be empty',
                'post_date.required' => 'Post date must be selected',
            ]
        );

        $in = $request->except('_token');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'post_' . time() . '.jpg';
            $location = 'asset/thumbnails/' . $filename;
            Image::make($image)->save($location);
            $in['image'] = $filename;
        }
        $res = Blog::create($in);
        if ($res) {
            return back()->with('success', 'Post was created Successfully!');
        } else {
            return back()->with('alert', 'Problem creating post');
        }
    }

    public function delcategory($id)
    {
        $data = Category::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Category was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Category');
        }
    }

    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        $path = './asset/thumbnails/';
        File::delete($path . $data->image);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Post Delete Successfully!');
        } else {
            return back()->with('alert', 'Problem With Deleting Post');
        }
    }

    public function unblog($id)
    {
        $blog = Blog::find($id);
        $blog->status = 0;
        $blog->save();
        return back()->with('success', 'Article has been unpublished.');
    }
    public function pblog($id)
    {
        $blog = Blog::find($id);
        $blog->status = 1;
        $blog->save();
        return back()->with('success', 'Article was successfully published.');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Blog';
        $post = $data['post'] = Blog::find($id);
        // $data['cat'] = Category::whereId($post->cat_id)->first();
        // $data['category'] = Category::all();
        return view('admin.blog.edit', $data);
    }

    public function CreateCategory(Request $request)
    {
        $macCount = Category::where('categories', $request->name)->count();
        if ($macCount > 0) {
            return back()->with('alert', 'This one Already Exist');
        } else {
            $data['categories'] = $request->name;
            $res = Category::create($data);
            if ($res) {
                return back()->with('success', 'Saved Successfully!');
            } else {
                return back()->with('alert', 'Problem With Adding New Category');
            }
        }
    }

    public function UpdateCategory(Request $request)
    {
        $mac = Category::findOrFail($request->id);
        $mac['categories'] = $request->name;
        $res = $mac->save();
        if ($res) {
            return back()->with('success', ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Category');
        }
    }

    public function updatePost(Request $request)
    {

        $data = Blog::find($request->id);
        $request->validate(
            [
                'title' => 'required',
                'cat_id' => 'required',
                'details' => 'required',
                'image' => 'nullable | mimes:jpeg,jpg,png | max:1000'
            ],
            [
                'title.required' => 'Post Title Must not be empty',
                'cat_id.required' => 'Category Must be selected',
                'details.required' => 'Post Details  must not be empty',
            ]
        );


        $in = Input::except('_token');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'post_' . time() . '.jpg';
            $location = 'asset/thumbnails/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/thumbnails/';
            File::delete($path . $data->image);
            $in['image'] = $filename;
        }
        $res = $data->fill($in)->save();

        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Article');
        }
        return $data;
    }

    public function earn($id)
    {
        $user = auth()->user();
        $record = BlogUser::where('user_id', $user->id)->where('post_id', $id)->first();
        if ($record) {
            return redirect()->route('user.blog.history')->with('error', "You have already earned from today's VIRAL SHARE. You can now go back to your dashboard to continue to earn from other social activities which RubicNetwork offers.");
        }
        $user = User::with('plan')->find($user->id);
        $user->update(['viral_share_earning' => $user->viral_share_earning + $user->plan->viral_share_bonus]);
        BlogUser::create([
            'user_id' => $user->id,
            'post_id' => $id,
            'bonus' => $user->plan->viral_share_bonus
        ]);
        return redirect()->route('user.blog.history')->with('success', "You have successfully earned from today's VIRAL SHARE. You can now go back to your dashboard to continue to earn from other social activities which RubicNetwork offers.");
        // $data['is_shared'] = false;
        // if (auth()->user()) {
        //     $user_shared_post = Post::whereHas('users', function ($q) {
        //         $q->where('users.id', auth()->user()->id);
        //     })->where('id', $id)->first();
        //     $data['is_shared'] = $user_shared_post !== null ? true : false;
        // }
        // $data['post'] = Post::find($id);
        // $html = view('front.partial_single_post', $data)->render();
        // return json_encode(array('status' => '1', 'html_text' => $html));
    }
}
