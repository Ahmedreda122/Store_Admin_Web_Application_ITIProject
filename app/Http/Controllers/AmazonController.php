<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class AmazonController extends Controller
{

    function __construct(){
        $this->middleware('auth')->only('store', 'delete', 'update');
    }

    public function index()
    {
        return view('products.index', ["products" => Product::all()]);
    }


    function show($id) {
        $product = Product::findOrFail($id);
        return view('products.itemInfo', $data = ["product"=> $product]);
    }

    function delete($id) {

        if (Auth::id() == null)
        {
            return view('auth.login');
        }

        $product = Product::findOrFail($id);
        $this->delete_old_image($product->Image);
        $product->delete();
        return to_route("products@index");
    }

    function create()
    {
        $categories = Category::all();
        return view('products.create', ["categories" => $categories]);
    }

    function store()
    {
        request()->validate([
            "name"=>'required|min:3',
            "price"=>"required"
        ]);
        $name = request('name');
        $desc = request("desc");
        $image = request("image");
        $price = request("price");
        $categoryID = request("categoryID");
        ## use this information to create new object from the Student model and save it to the database
        $product = new Product();
        $product->Name = $name;
        $product->Price = $price;
        $product->Description = $desc;
        $product->category_id = $categoryID;
        $this->save_image($image, $product);

        $product->save();
        return to_route('products@index');
    }

    function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', ['product'=>$product], ["categories" => $categories]);
    }

    function update($id){
        request()->validate([
            "name"=>'required|min:3',
            "price"=>"required"
        ]);
        $product = Product::findOrFail($id);
        ### get updated data from request object
        $name = request('name');
        $desc = request("desc");
        $image = request("image");
        $price = request("price");
        $categoryID = request("categoryID");
        $old_image_name = $product->Image;

        ###update existing object with the new data
        if ($name)
            $product->Name = $name;
        if ($desc)
            $product->Description = $desc;
        if ($price)
            $product->Price= $price;
        if ($categoryID)
            $product->category_id = $categoryID;

        if ($this->save_image($image, $product))
        {
            $this->delete_old_image($old_image_name);
        }

        ## to save it to the database
        $product->save();
        return to_route('products@show', $product->id);
    }

    private function save_image($image, &$product){
        if($image){
            $image_name = time().'.'.$image->extension();
            # move image from tmp folder to the public path
            $image->move(public_path('images/'), $image_name);
            $product->Image = $image_name;
            $product->save();
            return true;
        }
        return false;
    }

    # what will happen when update image ?
    private function delete_old_image($image_name){
        try{
            unlink('images/'.$image_name);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}
