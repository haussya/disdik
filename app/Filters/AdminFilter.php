<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (session()->role == '') {
      return redirect()->to('/login');
    } else if (session()->role != 'admin') {
      return redirect()->to('/user');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do Something
  }
}
