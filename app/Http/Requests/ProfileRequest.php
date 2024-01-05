<?php

namespace App\Http\Requests;

use App\Enum\TableEnum;
use App\Models\Authorization\User;
use App\Models\Employer;
use App\Models\Staff;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique(TableEnum::USERS)->ignore(Auth::id())],
            'photo' => ['nullable'],
            'password' => ['required'],
            'current_password' => ['required'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'current_password' => $this->input('password'),
        ]);
    }

    public function updateData()
    {
        $model = User::findOrFail(Auth::id());
        $model->update($this->validated());
        $this->saveFile($model);
        $this->saveOtherDetails($model);
        return $model;
    }

    public function saveFile($model): void
    {
        if ($this->hasFile('photo')) {
            $files = $this->file('photo');
            $storage = Storage::put('public/users/photos', $files);
            $filePath = str_replace('public/','',$storage);
            $model->photo = $filePath;
            $model->save();
        }
    }

    public function saveOtherDetails($model): void
    {
        $role = $model->getRoleNames()->first();
        if ($role === 'Employer'){
            Employer::where('user_id', $model->id)
                ->update([
                    'photo' => $model->photo,
                    'name' => $model->name,
                    'email' => $model->email,
                ]);
        } elseif ($role === 'Staff'){
            Staff::where('user_id', $model->id)
                ->update([
                    'photo' => $model->photo,
                    'name' => $model->name,
                    'email' => $model->email,
                ]);
        }
    }
}
