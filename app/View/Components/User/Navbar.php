<?php

namespace App\View\Components\User;

use Closure;
use Illuminate\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;


class Navbar extends Component
{
    public function render(): View|Closure|string
    {
        $loggedIn = Auth::check();
        $user = Auth::user();

        $menus = [];

        if ($loggedIn && $user) {
            if ($user->isadmin == 1) {
                $menus = [
                    ['label' => 'Dashboard', 'href' => '/admin'],
                    ['label' => 'Books', 'href' => '/book'],
                ];
            } else {
                $menus = [
                    ['label' => 'Dashboard', 'href' => '/'],
                    ['label' => 'Books', 'href' => '/student/book'],
                    ['label' => 'Borrowings', 'href' => '/student/borrowing'],
                ];
            }
        }
        
        // else {
        //     $menus = [
        //         ['label' => 'Login', 'href' => '/login'],
        //     ];
        

        return view('components.user.navbar', [
            'loggedIn' => $loggedIn,
            'menus' => $menus,
            'user' => $user,
        ]);
    }
}
