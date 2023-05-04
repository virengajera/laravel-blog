<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::all()->sortByDesc('updated_at');
        return view("blog.index",["blogs"=>$blogs]);
    }

    public function Myblogindex(Request $request){

        if(Auth::check()){
            $blogs = Blog::where('user_id',auth()->id())->get()->sortByDesc("updated_at");
            
            return view("blog.my-blog",["blogs"=>$blogs]);
        }
        else{
            return redirect('/');
        }

        
    }

    public function Blogindex(Blog $blog)
    {
            return view("blog.full",["blog"=>$blog]);
    }

    public function CreateBlog()
    {
        if(Auth::check()){
            return view("blog.create");
        }
        else{
            abort(403, 'Unauthorized Action');;
        }
    }

    public function EditBlogindex(Blog $blog)
    {
        if(auth()->id() == $blog->user_id){
            return view("blog.edit",["blog"=>$blog]);

        }
        else{
            abort(403, 'Unauthorized Action');
        }
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required'
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('blog', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Blog::create($formFields);

        return redirect('/blog/myblog')->with('message', 'Blog successfully created');
    }

    public function update(Request $request, Blog $blog) {
        // Make sure logged in user is owner
        if($blog->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'summary'=>'required',
            'content'=>'required'

        ]);


        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('blog', 'public');

            if($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
        }



        $blog->update($formFields);

        return redirect('/blog/myblog');
    }

    public function destroy(Blog $blog) {
        // Make sure logged in user is owner
        if($blog->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        if($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect('/blog/myblog')->with('message', 'Listing deleted successfully');
    }
}
