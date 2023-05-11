<?php

namespace App\Http\Controllers\Auth;

use App\Constants\Role;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'username' => ['required'],
            'usertype' => ['required'],
            'password' => ['required'],
        ]);

        /**
         *  Non-student authentication
         */

        if ($validated['usertype'] != Role::STUDENT) {

            if (Auth::guard('faculty')->attempt(['email' => $validated['username'], 'password' => $validated['password']])) {

                Auth::shouldUse('faculty');

                $request->session()->regenerate();

                $expiresAt = now()->addSeconds(config('session.lifetime'));
                $user = Faculty::find(Auth::user()->id);
                $user->session_expires_at = $expiresAt;
                $user->save();


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
        if ($validated['usertype'] == Role::STUDENT) {
            if (Auth::guard('student')->attempt(['student_id' => $validated['username'], 'password' => $validated['password']])) {

                Auth::shouldUse('student');

                $request->session()->regenerate();

                $expiresAt = now()->addSeconds(config('session.lifetime'));
                $user = Student::find(Auth::user()->id);
                $user->session_expires_at = $expiresAt;
                $user->save();

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
