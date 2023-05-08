<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateAccount extends Component
{

    use WithFileUploads;

    public $student;
    public $image;
    public $current_password;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'student.first_name' => 'required|regex:/^[\pL\s\-.]+$/u',
        'student.middle_name' => 'nullable|regex:/^[\pL\s\-.]+$/u',
        'student.last_name' => 'required|regex:/^[\pL\s\-.]+$/u',
        /*  'student.email' => 'required|email:rfs,dns|unique:students,email', */
    ];

    public function __construct()
    {
       Auth::shouldUse('student');
    }

    public function mount()
    {
        $this->student = Student::find(Auth::id());
        /*  $this->image = $this->student->image_path; */
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    }


    public function updateAccount()
    {
        $this->validate();

        if ($this->student->save()) {
            session()->flash('success', 'Account updated successfully!');

            Session::put('user', $this->student);

            $this->emitUp('userUpdated');
        };
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($this->current_password, $this->student->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }

        $this->student->update([
            'password' => Hash::make($this->password),
        ]);

        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';

        session()->flash('success', 'Password updated successfully!');
    }

    public function updateAvatar()
    {
        $path = $this->image->storeAs('/image/profile', 'student-' . Auth::id() . '.' . $this->image->getClientOriginalExtension());
        $this->student->image_path = $path;
        $this->student->save();

        session()->flash('success', 'Profile image updated successfully!');

        Session::put('user', $this->student);
        $this->emitUp('userUpdated');
    }

    public function render()
    {
        return view('livewire.student.update-account');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
