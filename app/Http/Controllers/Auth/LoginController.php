<?php

namespace App\Http\Controllers\Auth;

use App\Constants\Role;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\user;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {



        /*  $validated = $request->validate([
            'username' => 'required',
            'usertype' => 'required|integer',
            'password' => 'required',
        ]); */

        $username = $request['username'];
        $usertype = $request['usertype'];
        $password = $request['password'];

        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        /**
         *  Non-student authentication
         */

        if ($usertype != Role::STUDENT) {




            /* No account found */
            /*   if ($user == null) {
                return back()
                    ->withErrors([
                        'username' => 'Account not found.',
                    ])
                    ->withInput();
            } */

            /*  if ($user != null) { */

            /* For Disabled Accounts */
            /*  if ($user->trashed()) {
                    return back()->withErrors([
                        'username' => 'Your account was disabled for some reasons. Contact the administrator if you think its wrong.',
                    ])->withInput();
                } */

            /* For Enabled Accounts */

            if (Auth::guard('faculty')->attempt(['email' => $validated['username'], 'password' => $validated['password']])) {
                $request->session()->regenerate();

                Auth::shouldUse('faculty');

                /* For Admin */
                if (Auth::user()->usertype_id === Role::ADMIN) {
                    return redirect()->intended(route('admin.manage-dean.index'));
                }

                /* For Dean */
                if (Auth::user()->usertype_id === Role::DEAN) {
                    return redirect()->intended(route('dean.manage-clerk.index'));
                }

                /* For Clerk */
                if (Auth::user()->usertype_id === Role::CLERK) {
                    return redirect()->intended(route('clerk.manage-student.index'));
                }
            } else {
                return back()->withErrors([
                    'password' => 'Incorrect password',
                ])->withInput();
            }
        }

        /**
         *  Student Account
         */
        if ($usertype == Role::STUDENT) {

            /*  $user = Student::withTrashed()
                ->where('email', $username)
                ->orWhere('student_id', $username)
                ->first(); */

            /* No account found */
            /*    if ($user == null) {
                return back()->withErrors([
                    'username' => 'Account not found.',
                ])->withInput();
            } */

            if (Auth::guard('student')->attempt(['student_id' => $validated['username'], 'password' => $validated['password']])) {
                $request->session()->regenerate();

                Auth::shouldUse('student');

                if (Auth::user()->email_verified_at) {
                    return redirect()->intended(route('student.dashboard.index'));
                }

                return redirect()->intended(route('student.verification'));
            } else {
                return back()->withErrors([
                    'password' => 'Incorrect password',
                ])->withInput();
            }
        }
    }
}
