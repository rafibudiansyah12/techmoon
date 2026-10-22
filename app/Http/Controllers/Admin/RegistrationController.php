<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\{Event,EventRegistration};use Illuminate\Http\Request;
class RegistrationController extends Controller {
 public function index(Event $event,Request $r){$q=$event->registrations()->with('customer');if($r->filled('status'))$q->where('status',$r->status);return view('admin.registrations',['event'=>$event,'rows'=>$q->latest('registered_at')->paginate(20)->withQueryString()]);}
 public function update(Request $r,Event $event,EventRegistration $registration){abort_unless($registration->event_id===$event->id,404);$d=$r->validate(['status'=>'required|in:terdaftar,hadir,batal']);$registration->update($d);if($d['status']==='batal'&&$event->status==='penuh')$event->update(['status'=>'buka']);return back()->with('success','Status pendaftar diperbarui.');}
 public function export(Event $event){$rows=$event->registrations()->with('customer')->get();return response()->streamDownload(function()use($rows){$out=fopen('php://output','w');fputcsv($out,['Nama','Email','Telepon','Organisasi','Status','Waktu Daftar']);foreach($rows as $row)fputcsv($out,[$row->customer->name,$row->customer->email,$row->customer->phone,$row->customer->organization,$row->status,$row->registered_at]);fclose($out);},'pendaftar-event-'.$event->id.'.csv',['Content-Type'=>'text/csv']);}
}
