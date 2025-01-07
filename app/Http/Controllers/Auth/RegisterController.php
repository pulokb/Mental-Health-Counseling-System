<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/'; // Redirect to home page after registration

    public function __construct()
    {
        $this->middleware(['guest', 'blockIp']);
    }

    /**
     * Validate the registration request data.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'phone' => ['nullable', 'string', 'regex:/^\d{11}$/'], // Ensure phone is exactly 11 digits
            'address' => ['nullable', 'string', 'max:191'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10000'], // Validate image types
            'age' => ['nullable', 'date', 'before:today'], // Validate age as a valid date before today
            'gender' => 'required|string', // Specify allowed values for gender
            'occupation' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $imageName = null;

        // Check if an image was uploaded
        if (isset($data['image']) && $data['image']->isValid()) {
            $image = $data['image'];

            // Generate a unique file name
            $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resize the image and save it in the public directory
            $imagePath = 'user_images/' . $imageName;
            Image::make($image)->resize(250, 250)->save(public_path($imagePath));
        }

        // Calculate age from date of birth
        $age = null;
        if (!empty($data['age'])) {
            $age = Carbon::parse($data['age'])->age; // Calculate age using Carbon
        }

        // Create the user
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null,
            'image' => $imageName, // Store the image file name
            'age' => $age, // Store calculated age
            'gender' => $data['gender'],
            'occupation' => $data['occupation'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $this->guard()->login($user);

        return redirect($this->redirectTo); // Redirect to the desired route after registration
    }
}
