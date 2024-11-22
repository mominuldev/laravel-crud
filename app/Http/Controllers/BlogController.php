<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);

        return view('blogs.index', compact('blogs'));
    }


    public function show($id)
    {

        $blog = Blog::findOrFail($id);

        return view('blogs.show', ['blog' => $blog]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title'       => ['required', 'string', 'min:3'],
            'content'     => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'], // Ensure the category exists
            'image'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('images', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        // Create the blog post
        Blog::create($validated);


        // Redirect to the index page with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }


    public function edit($id)
    {

        $blog = Blog::findOrFail($id);

        $categories = Category::all();

        return view('blogs.edit', ['blog' => $blog, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {

        $blog = Blog::findOrFail($id);

        // Validate the request
        $validated = $request->validate([
            'title'       => ['required', 'string', 'min:3'],
            'content'     => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'], // Ensure the category exists
            'image'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($blog->image) {
                \Storage::disk('public')->delete('images/'.$blog->image);
            }

            // Upload the new image
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('images', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        // Update the blog post
        $blog->update($validated);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        // Find the blog post
        $blog = Blog::findOrFail($id);

        // Delete the image
        if ($blog->image) {
            \Storage::disk('public')->delete('images/'.$blog->image);
        }

        // Delete the blog post
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
