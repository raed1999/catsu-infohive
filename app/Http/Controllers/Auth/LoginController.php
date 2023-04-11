<?php

namespace App\Http\Controllers\Auth;

use App\Constants\Role;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
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
        $validated = $request->validate([
            'username' => 'required',
            'usertype' => 'required|integer',
            'password' => 'required',
        ]);

        $username = $validated['username'];
        $usertype = $validated['usertype'];
        $password = $validated['password'];

        /**
         *  Non-student authentication
         */
        if ($usertype != Role::STUDENT) {

            $faculty = Faculty::withTrashed()
                ->where('email', $username)
                ->first();

            /* No account found */
            if ($faculty == null) {
                return back()
                    ->withErrors([
                        'username' => 'Account not found.',
                    ])
                    ->withInput();
            }

            if ($faculty != null) {

                /* For Disabled Accounts */
                if ($faculty->trashed()) {
                    return back()->withErrors([
                        'username' => 'Your account was disabled for some reasons. Contact the administrator if you think its wrong.',
                    ])->withInput();
                }

                /* For Enabled Accounts */
                if (Hash::check($password, $faculty->password)) {
                    $request->session()->regenerate();

                    // Store user data in the session
                    $request->session()->put('user', $faculty);

                    /* For Admin */
                    if ($faculty->usertype_id === Role::ADMIN) {
                        return redirect()->intended(route('admin.manage-dean.index'));
                    }

                    /* For Dean */
                    if ($faculty->usertype_id === Role::DEAN) {
                        return redirect()->intended(route('dean.manage-clerk.index'));
                    }

                    /* For Clerk */
                    if ($faculty->usertype_id === Role::CLERK) {
                        return redirect()->intended(route('clerk.manage-student.index'));
                    }
                } else {
                    return back()->withErrors([
                        'password' => 'Incorrect password',
                    ])->withInput();
                }
            }
        }

        /**
         *  Student Account
         */
        if ($usertype == Role::STUDENT) {

            $student = Student::withTrashed()
                ->where('email', $username)
                ->orWhere('student_id', $username)
                ->first();

            /* No account found */
            if ($student == null) {
                return back()->withErrors([
                    'username' => 'Account not found.',
                ])->withInput();
            }

            if (Hash::check($password, $student->password)) {
                $request->session()->regenerate();

                // Store user data in the session
                $request->session()->put('user', $student);

                if ($student->email_verified_at) {
                    return redirect()->intended(route('student.manage-account.index'));
                }

                return redirect()->intended(route('student.verification'));
            } else {
                return back()->withErrors([
                    'password' => 'Incorrect password',
                ])->withInput();
            }
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
}
