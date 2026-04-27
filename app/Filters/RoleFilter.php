<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // kalau belum login
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        // kalau role tidak sesuai
        if ($arguments) {
            $role = $session->get('role');

            if (!in_array($role, $arguments)) {
                return redirect()->to('/dashboard')
                    ->with('error', 'Akses ditolak!');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // kosong
    }
}