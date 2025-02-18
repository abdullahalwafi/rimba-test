<?php

namespace App\Http\Middleware;

use Closure;
use Dotenv\Exception\ValidationException;
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
        try {
            // Validasi data
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

            // Cek umur lebih kecil dari 18 atau lebih besar dari 70
            if ($validatedData['age'] < 18) {
                return response()->json([
                    'message' => 'Umur harus lebih dari 18 tahun.',
                ], 400);
            } elseif ($validatedData['age'] > 70) {
                return response()->json([
                    'message' => 'Umur harus kurang dari 70 tahun.',
                ], 400);
            }
        } catch (ValidationException $e) {
            // Mengembalikan response JSON ketika validasi gagal
            return response()->json([
                'message' => 'Data yang dikirimkan tidak valid.',
                'errors' => $e->errors(),
            ], 422);
        }

        return $next($request);
    }
}
