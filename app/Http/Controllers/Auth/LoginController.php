<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/'; // Default redirect after login

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest', 'blockIp'])->except('logout');
    }

    /**
     * Handle login redirection based on user role.
     * This method checks the user's email domain to determine if they are an admin.
     *
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Check if the user's email ends with '@QuMindWell.com'
        if ($user->email && str_ends_with($user->email, '@QuMindWell.com')) {
            // Admin login: Redirect to admin dashboard
            return redirect()->route('dashboard');
        }

        // Regular user login: Redirect to user dashboard (home page)
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

        // Check if user exists, if not, create a new one
        $user = User::firstOrCreate(
            ['email' => $socialEmail],
            ['name' => $socialName, 'provider' => $provider]
        );

        Auth::login($user);

        // Handle redirection based on role after social login
        return $this->redirectAfterLogin($user);
    }

    /**
     * Handle logout and redirect to the home page after logout.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    /**
     * Determine where to redirect users based on their role after login.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectAfterLogin($user)
    {
        if ($user->email && str_ends_with($user->email, '@QuMindWell.com')) {
            return redirect()->route('dashboard'); // Admin dashboard
        }

        return redirect()->route('index'); // User dashboard
    }
}
