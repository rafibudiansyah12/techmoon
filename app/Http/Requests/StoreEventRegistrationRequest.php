<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreEventRegistrationRequest extends FormRequest {
 public function authorize(): bool { return true; }
 public function rules(): array { return ['website'=>'max:0','name'=>'required|string|max:120','email'=>'required|email|max:180','phone'=>'required|string|max:40','organization'=>'nullable|string|max:180']; }
 public function messages(): array { return ['website.max'=>'Permintaan tidak dapat diproses.']; }
}
