<?php

namespace App\Http\Requests\Auth;

use App\Enum\TableEnum;
use App\Mail\EmailVerification;
use App\Mail\NewUserRegistration;
use App\Models\Authorization\Role;
use App\Models\Authorization\User;
use App\Models\Employer;
use App\Models\Staff;
use App\Services\GeneralService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class RegisteredUserRequest extends FormRequest
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
            'email' => ['required','email',Rule::unique(TableEnum::USERS)],
            'active' => ['required'],
            'role' => ['required'],
            'password' => ['required','min:7'],
            'confirm_password' => ['required','same:password'],
            'current_password' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->input('role') == 3){
            $this->merge([
                'active' => false,
                'current_password' => $this->input('password'),
            ]);
        } else {
            $this->merge([
                'active' => true,
                'current_password' => $this->input('password'),
            ]);
        }

    }

    public function createData()
    {
        DB::beginTransaction();
        try {
            $model = User::create($this->validated());
            $model->roles()->sync($this->input('role'));
            $this->saveOtherDetail($model);
            Mail::to($this->input('email'))->send(new EmailVerification($model));
            DB::commit();
            return ['success' => true];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return ['success' => false];
        }
    }

    public function saveOtherDetail($model): void
    {
        $role = Role::findOrFail($this->input('role'));
        $fields = [
            'name' => $model->name,
            'email' => $model->email,
            'contact_number' => $this->input('contact_number'),
            'whatsapp_number' => $this->input('whatsapp_number'),
            'address' => $this->input('address'),
            'user_id' => $model->id,
        ];
        if ($role->name === 'Employer'){
            $data = Employer::create($fields);
            $subject = __('general.new_employer_registration');
            $role_name = $role->name;
            // $from = $data->email;
            // $to = GeneralService::getMail('super_admin');
            // Mail::send(new NewUserRegistration($data, $from, $to, $subject, $role_name));
            Mail::to(GeneralService::getMail('super_admin'))->send(new NewUserRegistration($data,$subject,$role_name));
        }
        elseif ($role->name === 'Staff'){
            $data = Staff::create($fields);
            $subject = __('general.new_staff_registration');
            $role_name = $role->name;
            // $from = $data->email;
            // $to = GeneralService::getMail('super_admin');
            // Mail::send(new NewUserRegistration($data, $from, $to, $subject, $role_name));
            Mail::to(GeneralService::getMail('super_admin'))->send(new NewUserRegistration($data,$subject,$role_name));
        }
    }
}
