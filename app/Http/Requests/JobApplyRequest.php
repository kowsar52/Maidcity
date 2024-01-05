<?php

namespace App\Http\Requests;

use App\Enum\TableEnum;
use App\Models\Job;
use App\Models\JobApply;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class JobApplyRequest extends FormRequest
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
            'full_name' => ['required'],
            'nationality' => ['required'],
            'date_of_birth' => ['required'],
            'email' => ['required', Rule::unique(TableEnum::JOB_APPLIES)],
            'contact_number' => ['required'],
            'alternative_contact_number' => ['nullable'],
            'whatsapp' => ['nullable'],
            'facebook_messenger_url' => ['nullable'],
            'job_id' => ['required'],
            'created_by' => ['nullable'],
        ];
    }

    public function createData(): JsonResponse
    {
        $output = ['success' => false, 'message' => __('general.something_went_wrong')];
        DB::beginTransaction();
        try {
            $model = JobApply::create($this->validated());
            $this->sendMail($model);
            DB::commit();
            return response()->json(['success' => true, 'message' => __('general.job_apply_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json($output);
        }
    }

    public function sendMail($model): void
    {
        $job = Job::with('createdBy')->findOrFail($model->job_id);
        Mail::to('Contact@maidcity.com.sg')->send(new \App\Mail\JobApply($model));
        if($job->createdBy->getRoleNames()->first() === 'Staff'){
            Mail::to($job->createdBy->email)->send(new \App\Mail\JobApply($model));
        }
    }
}
