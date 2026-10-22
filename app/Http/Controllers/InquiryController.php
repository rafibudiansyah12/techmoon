<?php
namespace App\Http\Controllers;
use App\Models\{Customer,Inquiry};use App\Http\Requests\StoreInquiryRequest;use Illuminate\Support\Facades\Mail;
class InquiryController extends Controller {
 public function store(StoreInquiryRequest $request){$data=$request->validated();$customer=Customer::updateOrCreate(['email'=>$data['email']],array_intersect_key($data,array_flip(['name','phone','segment','organization'])));$inquiry=Inquiry::create(['customer_id'=>$customer->id,'product_id'=>$data['product_id']??null,'message'=>$data['message'],'budget'=>$data['budget']??null]);Mail::raw('Inquiry baru #'.$inquiry->id.' dari '.$customer->name,function($m){$m->to(config('mail.from.address'))->subject('Inquiry baru TechMoon');});return redirect()->route('contact')->with('success','Terima kasih! Permintaan Anda sudah kami terima. Tim TechMoon akan segera menghubungi Anda.');}
}
