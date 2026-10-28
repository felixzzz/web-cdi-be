<?php

namespace App\Http\Requests\Utility;

use App\Enums\TopicType;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class InboxRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $topicRule = Rule::exists('topics', 'id');

        if ($this->routeIs('*contact-us*') || $this->is('*contact-us*')) {
            $topicRule->where('type', TopicType::ContactUs->value);
        } elseif ($this->routeIs('*whistleblowing*') || $this->is('*whistleblowing*')) {
            $topicRule->where('type', TopicType::Whistleblowing->value);
        }

        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'topic_id' => ['required', 'integer', $topicRule],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*') || $this->expectsJson()) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => __('The given data was invalid.'),
                'errors' => $validator->errors(),
            ], 422));
        }

        parent::failedValidation($validator);
    }
}

