<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreInquiryRequest extends FormRequest {
 public function authorize(): bool { return true; }
 public function rules(): array { return ['website'=>'max:0','name'=>'required|string|max:120','email'=>'required|email|max:180','phone'=>'required|string|max:40','segment'=>'required|in:korporat,umkm,pendidikan,umum','organization'=>'nullable|string|max:180','product_id'=>'nullable|exists:products,id','message'=>'required|string|min:10|max:4000','budget'=>'nullable|numeric|min:0']; }
 public function messages(): array { return ['website.max'=>'Permintaan tidak dapat diproses.']; }
}
