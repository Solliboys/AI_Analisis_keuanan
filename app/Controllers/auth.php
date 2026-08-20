<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function processLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($email === 'superadmin@dummy.com' && $password === '12345678') {
            session()->set('role', 'superadmin');
            return redirect()->to('superadmin');
        } elseif ($email === 'admin@dummy.com' && $password === '12345678') {
            session()->set('role', 'admin');
            return redirect()->to('admin');
        } else {
            session()->setFlashdata('error', 'Email atau password salah. (Gunakan superadmin@dummy.com / superadmin123 atau admin@dummy.com / admin123)');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function forgotPassword()
    {
        return view('forgot_password');
    }

    public function sendOtp()
    {
        $email = $this->request->getPost('email');

        // Simpan email ke session untuk ditampilkan di halaman verify
        session()->set('forgot_email', $email);

        // TODO: Logic kirim OTP ke email
        // Untuk sementara langsung redirect ke halaman verify OTP

        return redirect()->to('forgot-password/verify-otp');
    }

    public function verifyOtp()
    {
        // Jika POST (submit form verifikasi)
        if ($this->request->getMethod() === 'post') {
            $otp = $this->request->getPost('otp');

            // TODO: Logic verifikasi OTP
            // Untuk sementara langsung redirect ke reset password

            return redirect()->to('forgot-password/reset');
        }

        // GET: tampilkan halaman verify OTP
        return view('verify_otp');
    }

    public function resetPassword()
    {
        // Jika POST (submit form reset)
        if ($this->request->getMethod() === 'post') {
            $newPassword     = $this->request->getPost('new_password');
            $confirmPassword = $this->request->getPost('confirm_password');

            // TODO: Logic reset password di database

            // Setelah berhasil, redirect ke login
            session()->setFlashdata('success', 'Password berhasil direset. Silakan login.');
            return redirect()->to('/');
        }

        // GET: tampilkan halaman reset password
        return view('reset_password');
    }
}