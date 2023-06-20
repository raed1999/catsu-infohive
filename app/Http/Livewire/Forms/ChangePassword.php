<?php

namespace App\Http\Livewire\Forms;

use App\Constants\Role;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class ChangePassword extends Component
{

    public $guard;

    public $password;
    public $password_confirmation;

    public function __construct()
    {
        if (Auth::guard('faculty')->check()) {
            Auth::shouldUse('faculty');
        }

        if (Auth::guard('student')->check()) {
            Auth::shouldUse('student');
        }
    }
    protected function rules()
    {
        return
            [
                'password' =>    [
                    'required',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers(),
                    'confirmed'
                ],
            ];
    }

    public function render()
    {
        return view('livewire.forms.change-password');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        if (Auth::user()->usertype_id != Role::STUDENT) {
            $faculty = Faculty::findOrFail(Auth::id());
            $faculty->password = Hash::make($this->password);
            $faculty->save();
        }

        if (Auth::user()->usertype_id == Role::STUDENT) {
            $student = Student::findOrFail(Auth::id());
            $student->password = Hash::make($this->password);
            $student->save();
        }

        session()->flash('success', 'Password changed successfully. Use your new password to login.');

        return redirect()->to(route('auth.login'));
    }
}
