<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'min:6', 'max:100'],
            'contact' => ['required', 'string', 'size:9', $this->uniqueRule('contacts', 'contact')],
            'email_address' => ['required', 'string', 'max:100', 'email', $this->uniqueRule('contacts', 'email_address')]
        ];
    }

    private function uniqueRule(string $table, string $column)
    {
        $id = $this->route('contact');

        $rule = Rule::unique($table, $column)->whereNull('deleted_at');

        if (isset($id)) {
            $rule->ignore($id);
        }

        return $rule;
    }
}
