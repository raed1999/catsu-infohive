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

            Auth::shouldUse('faculty');

            $faculty = Faculty::where('email', $validated['username'])->withTrashed()->first();

            /* Check if account exist */
            if (!$faculty) {
                return back()->withErrors([
                    'username' => 'Username doesn\'t exist.',
                ])->withInput();
            }

            /* Check if account is active */
            if ($faculty && $faculty->deleted_at) {
                return back()->withErrors([
                    'username' => 'Your account is disabled for some reason. Contact your administrator for more information.',
                ])->withInput();
            }

            /* Password */
            if (!Hash::check($validated['password'], $faculty->password)) {
                return back()->withErrors([
                    'password' => 'Incorrect password.',
                ])->withInput();
            }

            if (Auth::guard('faculty')->attempt(['email' => $validated['username'], 'password' => $validated['password']])) {

                $request->session()->regenerate();

                $expiresAt = now()->addSeconds(config('session.lifetime'));
                $user = Faculty::find(Auth::user()->id);
                $user->session_expires_at = $expiresAt;
                $user->save();

                /* For Admin */
                if (Auth::user()->usertype_id === Role::ADMIN) {
                    return redirect()->intended(route('admin.manage-dashboard.index'));
                }

                /* For Dean */
                if (Auth::user()->usertype_id === Role::DEAN) {
                    return redirect()->intended(route('dean.manage-dashboard.index'));
                }

                /* For Clerk */
                if (Auth::user()->usertype_id === Role::CLERK) {
                    return redirect()->intended(route('clerk.manage-dashboard.index'));
                }
            }
        }

        /**
         *  Student Account
         */
        if ($validated['usertype'] == Role::STUDENT) {

            Auth::shouldUse('student');

            $student = Student::where('student_id', $validated['username'])->withTrashed()->first();

            /* Check if account exist */
            if (!$student) {
                return back()->withErrors([
                    'username' => 'Username doesn\'t exist.',
                ])->withInput();
            }

            /* Check if account is active */
            if ($student && $student->deleted_at) {
                return back()->withErrors([
                    'username' => 'Your account is disabled for some reason. Contact your administrator for more information.',
                ])->withInput();
            }

            /* Password */
            if (!Hash::check($validated['password'], $student->password)) {
                return back()->withErrors([
                    'password' => 'Incorrect password.',
                ])->withInput();
            }

            if (Auth::guard('student')->attempt(['student_id' => $validated['username'], 'password' => $validated['password']])) {

                $request->session()->regenerate();

                $expiresAt = now()->addSeconds(config('session.lifetime'));
                $user = Student::find(Auth::user()->id);
                $user->session_expires_at = $expiresAt;
                $user->save();

                if (Auth::user()->email_verified_at) {
                    return redirect()->intended(route('student.research.index'));
                }

                return redirect()->intended(route('student.verification'));
            }
        }
    }
}
