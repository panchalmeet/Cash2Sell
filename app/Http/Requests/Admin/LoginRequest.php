<?php

/**
 * Admin Login Request
 *
 * PHP version 8.1
 *
 * @category Authentication
 * @package  App\Http\Requests\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Admin requests validate
 *
 * PHP version 8.1
 *
 * @category Authentication
 * @package  App\Http\Requests\Admin
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => __('error.LOGIN_ERROR'),
            'email.exists' => __('error.LOGIN_ERROR')
        ];
    }
}
