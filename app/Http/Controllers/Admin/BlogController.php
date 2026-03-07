<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:500',
            'status'   => 'required',
        ]);

        try {
            $blog = new Blog();
            $blog->title             = $request->title;
            $blog->slug              = Str::slug($request->title) . '-' . time();
            $blog->category          = $request->category;
            $blog->short_description = $request->short_description;
            $blog->content           = $request->content;
            $blog->status            = $request->status;
            $blog->published_at      = $request->published_at ?? now();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/blog'), $filename);
                $blog->image = $filename;
            }

            $blog->save();
            $this->notice->success('Blog created successfully!');
            return redirect()->route('admin.blog.index');
        } catch (Exception $e) {
            $this->notice->warning('Something went wrong! Please try again.');
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'  => 'required|string|max:500',
            'status' => 'required',
        ]);

        try {
            $blog = Blog::findOrFail($id);
            $blog->title             = $request->title;
            $blog->category          = $request->category;
            $blog->short_description = $request->short_description;
            $blog->content           = $request->content;
            $blog->status            = $request->status;
            $blog->published_at      = $request->published_at;

            if ($request->hasFile('image')) {
                // Delete old image
                if ($blog->image && file_exists(public_path('uploads/blog/' . $blog->image))) {
                    unlink(public_path('uploads/blog/' . $blog->image));
                }
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/blog'), $filename);
                $blog->image = $filename;
            }

            $blog->save();
            $this->notice->success('Blog updated successfully!');
            return redirect()->route('admin.blog.index');
        } catch (Exception $e) {
            $this->notice->warning('Something went wrong! Please try again.');
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            if ($blog->image && file_exists(public_path('uploads/blog/' . $blog->image))) {
                unlink(public_path('uploads/blog/' . $blog->image));
            }
            $blog->delete();
            $this->notice->success('Blog deleted successfully!');
            return back();
        } catch (Exception $e) {
            $this->notice->warning('Something went wrong! Please try again.');
            return back();
        }
    }
}
