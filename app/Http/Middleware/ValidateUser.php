<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'age' => 'required|integer',
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'age.required' => 'Umur harus diisi.',
            'age.integer' => 'Umur harus berupa angka.',
        ]);

        if ($validatedData['age'] < 18) {
            return response()->json([
                'message' => 'Umur harus lebih dari 18 tahun.',
            ], 400);
        } elseif ($validatedData['age'] > 70) {
            return response()->json([
                'message' => 'Umur harus kurang dari 70 tahun.',
            ], 400);
        }

        return $next($request);
    }

}
