<?php
namespace App\Http\Controllers;
use App\Models\{Pillar,Product,Portfolio,Event,Testimonial};
use Illuminate\Http\Request;
class PublicController extends Controller {
 public function home(){return view('public.home',['pillars'=>Pillar::withCount('products')->get(),'products'=>Product::active()->featured()->take(6)->get(),'events'=>Event::upcoming()->withCount(['registrations as reserved_count'=>fn($q)=>$q->where('status','!=','batal')])->take(3)->get(),'testimonials'=>Testimonial::where('is_published',true)->latest()->get(),'metrics'=>['products'=>Product::active()->count(),'portfolios'=>Portfolio::count(),'events'=>Event::upcoming()->count()]]);}
 public function products(Request $r){$q=Product::active()->with('pillar');if($r->filled('pillar'))$q->whereHas('pillar',fn($p)=>$p->where('slug',$r->pillar));if($r->filled('q'))$q->where('name','like','%'.$r->q.'%');return view('public.products',['products'=>$q->latest()->paginate(9)->withQueryString(),'pillars'=>Pillar::all()]);}
 public function product(Product $product){abort_unless($product->is_active,404);return view('public.product',['product'=>$product->load('pillar'),'related'=>Product::active()->where('pillar_id',$product->pillar_id)->whereKeyNot($product->id)->take(3)->get()]);}
 public function portfolios(){return view('public.portfolios',['portfolios'=>Portfolio::latest()->paginate(9)]);} public function portfolio(Portfolio $portfolio){return view('public.portfolio',['portfolio'=>$portfolio]);}
 public function events(){return view('public.events',['events'=>Event::upcoming()->withCount(['registrations as reserved_count'=>fn($q)=>$q->where('status','!=','batal')])->orderBy('start_at')->paginate(9)]);} public function event(Event $event){return view('public.event',['event'=>$event->loadCount(['registrations as reserved_count'=>fn($q)=>$q->where('status','!=','batal')])]);}
 public function about(){return view('public.about',['pillars'=>Pillar::all()]);}
 public function contact(Request $request){return view('public.contact',['product'=>Product::active()->find($request->integer('product_id')),'products'=>Product::active()->orderBy('name')->get()]);}
}
