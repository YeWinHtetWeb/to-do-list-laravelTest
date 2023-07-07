<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // Home
    public function createPage(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        // dd($posts);
        return view('home', compact('posts'));
    }

    // Create Post
    public function create(Request $request){
        // Validation Check
        $this->postValidationCheck($request);

        $data = $this->getPostData($request);
        Post::create($data);
        return to_route('post#createPage')->with(['createSuccess' => 'The Post was completely posted...']);
    }

    // Delete Post
    public function delete($id){
        Post::where('id', $id)->first()->delete();
        return back()->with(['deleteSuccess' => 'The post was successfully deleted...']);
    }

    // See More Post
    public function seeMore($id){
        $post = Post::where('id', $id)->first()->toArray();
        // dd($post);
        return view('seeMore', compact('post'));
    }

    // Edit Page
    public function editPage($id){
        $post = Post::where('id', $id)->first()->toArray();
        // dd($post);
        return view('edit', compact('post'));
    }

    // Post Update
    public function update(Request $request){
        // Validation Check
        $this->postValidationCheck($request);

        $id = $request->postId;
        $updateData = $this->getPostData($request);
        $update = Post::where('id', $id)->update($updateData);
        return redirect()->route('post#createPage')->with(['updateSuccess' => 'The post was successfully updated...']);
    }

    // Post Validation check
    private function postValidationCheck($request){
        $validationRules = [
            'postTitle' => 'required|min:5|unique:posts,title,' . $request->postId,
            'postDescription' => 'required|min:5',
            'postImage' => 'mimes::jpg,bmp,png|file',
            'postPrice' => 'required',
            'postAddress' => 'required',
            'postRating' => 'required'
        ];

        $validationMessage = [
            'postTitle.required' => "Post title ဖြည့်ရန်လိုအပ်ပါသည်။",
            'postTitle.min' => "အနည်းဆုံး စာလုံးရေ ၅ လုံးပြည့်အောင်ဖြည့်ပါ။",
            'postTitle.unique' => "Post title နာမည်တူရှိနေသောကြောင့် ပြောင်းလဲသတ်မှတ်ပါ။",
            'postDescription.required' => "Post description ဖြည့်ရန်လိုအပ်ပါသည်။",
            'postDescription.min' => "အနည်းဆုံး စာလုံးရေ ၅ လုံးပြည့်အောင်ဖြည့်ပါ။",
            'postImage.mimes' => "png, jpeg, jpg file type များသာ ထည့်ပါ။",
            'postImage.file' => "file type များသာ ထည့်ပါ။",
            'postPrice.required' => "Post Price ဖြည့်ရန်လိုအပ်ပါသည်။",
            'postAddress.required' => "Post Address ဖြည့်ရန်လိုအပ်ပါသည်။",
            'postRating.required' => "Post Rating ဖြည့်ရန်လိုအပ်ပါသည်။",
        ];

        Validator::make($request->all(), $validationRules, $validationMessage)->validate();
    }

    // Get Data from Post
    private function getPostData($request){
        return [
            'title' => $request->postTitle,
            'description' => $request->postDescription,
            'image' => $request->postImage,
            'price' => $request->postPrice,
            'address' => $request->postAddress,
            'rating' => $request->postRating
        ];
    }
}
