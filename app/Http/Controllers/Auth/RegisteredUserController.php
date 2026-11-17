<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        $classes = SchoolClass::orderBy('nama_kelas')->get();

        return view('auth.register', compact('classes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'role' => ['required', Rule::in(['murid', 'guru', 'admin'])],
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:50', 'alpha_dash', 'unique:users,username'],
            'email' => ['nullable', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],

            // Field khusus murid
            'kelas_id' => [
                Rule::requiredIf(fn () => $request->input('role') === 'murid'),
                'nullable',
                'exists:kelas,id',
            ],
            'nisn' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('murid', 'nisn'),
            ],
            'jenis_kelamin' => ['nullable', Rule::in(['L', 'P'])],
            'no_hp' => ['nullable', 'string', 'max:20'],

            // Field khusus guru
            'nip' => [
                'nullable',
                'string',
                'max:30',
                Rule::unique('guru', 'nip'),
            ],
        ], [
            'role.required' => 'Pilih peran akun (Murid, Guru, atau Admin).',
            'role.in' => 'Peran akun tidak valid.',
            'username.unique' => 'Username ini sudah digunakan.',
            'username.alpha_dash' => 'Username hanya boleh berupa huruf, angka, strip, dan garis bawah.',
            'kelas_id.required' => 'Kelas wajib dipilih untuk pendaftaran murid.',
            'nip.unique' => 'NIP ini sudah terdaftar.',
            'nisn.unique' => 'NISN ini sudah terdaftar.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = DB::transaction(function () use ($validated, $request) {
            $user = User::create([
                'name' => $validated['nama'],
                'username' => $validated['username'],
                'email' => $validated['email'] ?? $validated['username'],
                'password' => $validated['password'],
                'role' => $validated['role'],
            ]);

            if ($validated['role'] === 'murid') {
                Student::create([
                    'user_id' => $user->id,
                    'nama' => $validated['nama'],
                    'kelas_id' => $validated['kelas_id'] ?? null,
                    'nisn' => $validated['nisn'] ?? null,
                    'nis' => $validated['nisn'] ?? null,
                    'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
                    'no_hp' => $validated['no_hp'] ?? null,
                    'status' => true,
                ]);
            } elseif ($validated['role'] === 'guru') {
                Teacher::create([
                    'user_id' => $user->id,
                    'nama' => $validated['nama'],
                    'nip' => $validated['nip'] ?? null,
                    'email' => $validated['email'] ?? null,
                    'no_hp' => $validated['no_hp'] ?? null,
                    'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
                    'status' => true,
                ]);
            }

            return $user;
        });

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Pendaftaran akun berhasil! Selamat datang.');
    }
}
