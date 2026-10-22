<?php
namespace App\Http\Middleware;
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;
class AdminRole { public function handle(Request $request,Closure $next): Response {abort_unless($request->user() && in_array($request->user()->role,['admin','manajer'],true),403);return $next($request);} }
