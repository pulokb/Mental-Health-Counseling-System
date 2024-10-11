<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/'; // Redirect to the root route after login

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Redirect to / after login for authenticated users
        $this->redirectTo = '/';
        $this->middleware(['guest', 'blockIp'])->except('logout');
    }

    /**
     * Handle login redirection based on user role.
     * This is simplified to redirect all users to the home page (/).
     *
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // After login, redirect all users to the home page (/)
        return redirect()->route('index');
    }

    /**
     * Redirect the user to the social provider authentication page.
     *
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the social provider and log them in.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        $socialiteUser = Socialite::driver($provider)->user();
        $socialEmail = $socialiteUser->getEmail();
        $socialName = $socialiteUser->getName();

        // Check if the user exists, otherwise create a new one
        $user = User::where('email', $socialiteUser->getEmail())->first();
        if ($user) {
            Auth::login($user);
        } else {
            $newUser = User::create([
                'name' => $socialName,
                'email' => $socialEmail,
                'provider' => $provider,
            ]);
            Auth::login($newUser);
        }

        // After social login, redirect to the home page (/)
        return redirect()->route('index');
    }

    /**
     * Override the default logout method to redirect to the home page after logout.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        // Redirect to the home page (/) after logout
        return $this->loggedOut($request) ?: redirect('/');
    }
}
