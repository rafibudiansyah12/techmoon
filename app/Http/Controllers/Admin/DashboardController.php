<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\{Inquiry,EventRegistration,Product,Event};
class DashboardController extends Controller {public function __invoke(){return view('admin.dashboard',['new'=>Inquiry::where('status','baru')->count(),'inquiries'=>Inquiry::count(),'registrations'=>EventRegistration::count(),'products'=>Product::active()->count(),'events'=>Event::upcoming()->count(),'latest'=>Inquiry::with('customer')->latest()->take(5)->get()]);}}
