<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Image;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/'; // Redirect to home page after registration

    public function __construct()
    {
        $this->middleware(['guest', 'blockIp']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:15'],
            'address' => ['nullable', 'string', 'max:191'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable', 'image', 'max:10000'], // Image validation
            'age' => 'required|integer|min:1', // Validation for age
            'gender' => 'required|string',
            'occupation' => 'required|string|max:255',
        ]);
    }

    protected function create(array $data)
    {
        $imageName = null;

        // Check if an image was uploaded
        if (isset($data['image']) && $data['image']->isValid()) {
            $image = $data['image'];

            // Create a unique file name
            $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resize the image and save it in the public directory
            $imagePath = 'user_images/' . $imageName;
            Image::make($image)->resize(250, 250)->save(public_path($imagePath));
        }

        // Create the user
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'image' => $imageName, // Store the image file name
            'age' => $data['age'],
            'gender' => $data['gender'],
            'occupation' => $data['occupation'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $this->guard()->login($user);

        return redirect($this->redirectTo); // Redirect to the desired route after registration
    }
}
