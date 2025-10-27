<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class PageController extends Controller
{
    /**
     * Show the home page.
     */
    public function home()
    {
        return Inertia::render('Home');
    }

    /**
     * Show the contact form.
     */
    public function contact()
    {
        return Inertia::render('Contact');
    }

    /**
     * Handle the contact form submission.
     */
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        // Here you would typically send an email or store in database
        // For now, we'll just show a success message

        return redirect()
            ->back()
            ->with('success', 'Thank you for your message! We\'ll get back to you soon.');
    }
}