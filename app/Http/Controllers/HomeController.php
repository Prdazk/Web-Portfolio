<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Experience;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\IconBox;
use App\Models\Product;
use App\Models\Stack;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function Home(){
        $hero = Hero::first();
        $icon_data = IconBox::all();
        $experience_data = Experience::all();
        $technology = Technology::all();
        $stack = Stack::all();
        $faq = FAQ::all();
        $product = Product::all();
        $gallery = Gallery::all();

        return view('Frontend.index', compact('hero','icon_data', 'experience_data', 'technology', 'stack', 'faq', 'product', 'gallery'));
    }

    public function NotFound(){
        return view('FrontEnd.notFound');
    }

    public function Contact(Request $request){
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect()->back()->with('messages', [
            'type' => 'success',
            'text' => 'Email Sent Successfully'
        ]);
        

    }

    public function ProjectDetails(Request $request, $id){

        $product = Technology::with('images')->findOrFail($id);
        
        return view('Frontend.project_details', compact('product'));
    }


    public function download()
    {
        $filePath = public_path('upload/CV.pdf');
    
        if (file_exists($filePath)) {
            // Return a response with the file for download
            return response()->download($filePath, 'ShuvoBhowmik.pdf');
        } else {
            // If the file does not exist, return a 404 error
            return redirect()->back()->with('messages', [
                'type' => 'error',
                'text' => 'Error Downloading File'
            ]);
        }
    }

    
    
}
