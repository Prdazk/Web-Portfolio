<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Experience;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\IconBox;
use App\Models\Product;
use App\Models\Stack;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\Hero;
use Image;

class AdminController extends Controller
{
    public function Hero()
    {
        $data = Hero::all();
        return view('Backend.page.hero', compact('data'));
    }

    public function AddHero(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        if ($request->file('avatar')->isValid()) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('upload'), $avatar);
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        Hero::create([
            'title' => $request->title,
            'description' => $request->description,
            'avatar' => $avatar,
        ]);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Inserted Successfully"
        ]);
    }

    public function UpdateHero(Request $request)
    {

        $id = $request->input('id');

        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
            ]);

            if ($request->file('avatar')->isValid()) {
                $avatar = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path('upload'), $avatar);
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }

            Hero::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'avatar' => $avatar
            ]);


        } else {
            Hero::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description
            ]);
        }



        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Updated Successfully"
        ]);



    }

    public function DeleteHero($id)
    {
        $item = Hero::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    }

    public function IconBox()
    {
        $data = IconBox::all();
        return view('Backend.page.iconbox', compact('data'));
    }

    public function AddIconBox(Request $request)
    {
       

        IconBox::create([
            'title' => $request->title,
            'icon' => $request->icon
        ]);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Inserted Successfully"
        ]);
    }


    public function UpdateIconBox(Request $request)
    {

        $id = $request->input('id');

        IconBox::findOrFail($id)->update([
            'title' => $request->title,
            'icon' => $request->icon
        ]);



        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Updated Successfully"
        ]);



    } 


    public function DeleteIconBox($id)
    {
        $item = IconBox::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    }

    public function WorkExperience()
    {
        $data = Experience::all();
        return view('Backend.page.work_experience', compact('data'));
    }

        public function AddExperience(Request $request){

        $request->validate([
            'company_name'  => 'required|string',
            'designation'   => 'required|string',
            'date'          => 'required|string',
            'responsiblity' => 'required|string',
        ]);

        Experience::create([
            'company_name' => $request->company_name,
            'designation' => $request->designation,
            'date' => $request->date,
            'responsiblity' => $request->responsiblity
        ]);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Inserted Successfully"
        ]);

    }

    public function UpdateExperience(Request $request)
    {

        $id = $request->input('id');

        $request->validate([
            'company_name'  => 'required|string',
            'designation'   => 'required|string',
            'date'          => 'required|string',
            'responsiblity' => 'required|string',
        ]);

        Experience::findOrFail($id)->update([
            'company_name' => $request->company_name,
            'designation' => $request->designation,
            'date' => $request->date,
            'responsiblity' => $request->responsiblity
        ]);



        return redirect('/admin/work-experience')->with('message', [
            'type' => 'success',
            'text' => "Data Updated Successfully"
        ]);



    } 

    public function EditExperience(Request $request, $id){
        $data = Experience::find($id);
        return view('Backend.page.edit_experience', compact('data') );
    }

    public function DeleteExperience($id)
    {
        $item = Experience::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    }  


    public function Technology()
    {
        $data = Technology::with('images')->get();
        $stack = Stack::all();
        return view('Backend.page.technology', compact('data', 'stack'));
    }

            public function AddTechnology(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'stack_id'    => 'required|string|max:255',
            'description' => 'required|string',
            'github_link' => 'nullable|url',
            'demo_link'   => 'nullable|url',
            'screenshot'  => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $screenshot = null;

        if ($request->hasFile('screenshot') && $request->file('screenshot')->isValid()) {
            $screenshot = $request->file('screenshot')->getClientOriginalName();
            $request->file('screenshot')->move(public_path('upload'), $screenshot);
        }

        Technology::create([
            'name'        => $request->name,
            'category'    => $request->category,
            'stack_id'    => $request->stack_id,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'demo_link'   => $request->demo_link,
            'screenshot'  => $screenshot,
        ]);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Inserted Successfully"
        ]);
    }


        public function UpdateTechnology(Request $request)
    {
        $id = $request->input('id');

        $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'stack_id'    => 'required|string|max:255',
            'description' => 'required|string',
            'github_link' => 'nullable|url',
            'demo_link'   => 'nullable|url',
            'screenshot'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $item = Technology::findOrFail($id);

        $data = [
            'name'        => $request->name,
            'category'    => $request->category,
            'stack_id'    => $request->stack_id,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'demo_link'   => $request->demo_link,
        ];

        if ($request->hasFile('screenshot') && $request->file('screenshot')->isValid()) {
            $screenshot = $request->file('screenshot')->getClientOriginalName();
            $request->file('screenshot')->move(public_path('upload'), $screenshot);
            $data['screenshot'] = $screenshot;
        }

        $item->update($data);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Updated Successfully"
        ]);
    }


        public function DeleteTechnology($id)
    {
        $item = Technology::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    }  

    public function AddTechnologyImage(Request $request, $id)
    {
        Technology::findOrFail($id);

        $existingCount = \App\Models\TechnologyImage::where('technology_id', $id)->count();

        $request->validate([
            'images'   => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $newCount = count($request->file('images'));

        if ($existingCount + $newCount > 10) {
            return response()->json([
                'success' => false,
                'message' => 'Maksimal 10 gambar per proyek. Sisa slot: ' . max(0, 10 - $existingCount),
            ], 422);
        }

        $uploaded = [];

        foreach ($request->file('images') as $file) {
            if ($file->isValid()) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload'), $filename);

                $image = \App\Models\TechnologyImage::create([
                    'technology_id' => $id,
                    'image'         => $filename,
                ]);

                $uploaded[] = [
                    'id'  => $image->id,
                    'url' => asset('upload/' . $filename),
                ];
            }
        }

        return response()->json([
            'success' => true,
            'images'  => $uploaded,
        ]);
    }

    public function DeleteTechnologyImage($id)
    {
        $item = \App\Models\TechnologyImage::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    }

    public function FAQ()
    {
        $data = FAQ::all();
        return view('Backend.page.faq', compact('data'));
    } 
    
    
    public function AddFAQ(Request $request){

        FAQ::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Inserted Successfully"
        ]);

    }  


    public function UpdateFAQ(Request $request)
    {

        $id = $request->input('id');

        FAQ::findOrFail($id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);



        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Updated Successfully"
        ]);



    } 


    public function DeleteFAQ($id)
    {
        $item = FAQ::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    }  

    public function STACK()
    {
        $data = Stack::all();
        return view('Backend.page.stack', compact('data'));
    }  


        public function AddStack(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $logo = null;

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $logo = $request->file('logo')->getClientOriginalName();
                $request->file('logo')->move(public_path('upload'), $logo);
            }
        }

        Stack::create([
            'name' => $request->name,
            'logo' => $logo,
        ]);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Inserted Successfully"
        ]);
    }


    public function UpdateStack(Request $request)
    {
        $id = $request->input('id');

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->file('logo')->isValid()) {
                $logo = $request->file('logo')->getClientOriginalName();
                $request->file('logo')->move(public_path('upload'), $logo);
            }

            Stack::findOrFail($id)->update([
                'name' => $request->name,
                'logo' => $logo,
            ]);

        } else {
            Stack::findOrFail($id)->update([
                'name' => $request->name,
            ]);
        }

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Updated Successfully"
        ]);
    }


    public function DeleteStack($id)
    {
        $item = Stack::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    }  


    public function Product()
    {
        $data = Product::all();
        $stack = Stack::all();
        return view('Backend.page.product', compact('data', 'stack'));
    }  


    public function AddProduct(Request $request)
    {

    $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        if ($request->file('avatar')->isValid()) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('upload'), $avatar);
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        $product = Product::create([
            'stack_id' => $request->stack_id,
            'name' => $request->name,
            'avatar' => $avatar,
            'title' => $request->title,
            'link' => $request->link
        ]);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Inserted Successfully"
        ]);
    }  



    public function UpdateProduct(Request $request)
    {

        $id = $request->input('id');


        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
            ]);

            if ($request->file('avatar')->isValid()) {
                $avatar = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path('upload'), $avatar);
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }

            Product::findOrFail($id)->update([
                'title' => $request->title,
                'name' => $request->name,
                'avatar' => $avatar,
                'stack_id' => $request->stack_id,
                'link' => $request->link
            ]);


        } else {
            Product::findOrFail($id)->update([
                'title' => $request->title,
                'name' => $request->name,
                'stack_id' => $request->stack_id,
                'link' => $request->link
            ]);
        }



        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Updated Successfully"
        ]);



    }


    public function DeleteProduct($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    } 
    
    
    public function ProductGallery()
    {
        $product = Product::all();
        $data = Gallery::all();
        return view('Backend.page.gallery', compact('product','data'));
    }  


    public function AddProductGallery(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        if ($request->file('avatar')->isValid()) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('upload'), $avatar);
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        Gallery::create([
            'product_id' => $request->product_id,
          
            'avatar' => $avatar,
        ]);

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Inserted Successfully"
        ]);
    }  



    public function UpdateProductGallery(Request $request)
    {

        $id = $request->input('id');


        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
            ]);

            if ($request->file('avatar')->isValid()) {
                $avatar = $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move(public_path('upload'), $avatar);
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }

            Gallery::findOrFail($id)->update([
              
                'avatar' => $avatar,
                'product_id' => $request->product_id
            ]);


        } else {
            Product::findOrFail($id)->update([
                
                'product_id' => $request->product_id
            ]);
        }



        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => "Data Updated Successfully"
        ]);



    } 


    public function DeleteProductGallery($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    } 


    public function Contact()
    {
        
        $data = Contact::all();
        return view('Backend.page.contact', compact('data'));
    } 


    public function DeleteContact($id)
    {
        $item = Contact::findOrFail($id);
        $item->delete();
        return response()->json(['success' => true]);
    } 






}