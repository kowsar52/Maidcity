<?php

namespace App\Http\Requests;

use App\Mail\EmployerUpdateMdwRequirements;
use App\Models\EmployerMDWRequirement;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmployerMDWRequirementRequest extends FormRequest
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
            'answer1' => ['required'],
            'answer2' => ['required'],
            'answer3' => ['required'],
            'answer4' => ['required'],
            'answer5' => ['required'],
            'user_id' => ['required'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }

    public function createData()
    {
        return EmployerMDWRequirement::create($this->validated());
    }

    public function updateData($id)
    {
        $model = EmployerMDWRequirement::findOrFail($id);
        $model->update($this->validated());
        if ($model){
            Mail::to('contact@maidcity.com.sg')->send(new EmployerUpdateMdwRequirements($model));
        }
        return $model;
    }
}
