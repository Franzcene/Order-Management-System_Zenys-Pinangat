<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Handle form submission
    public function submitForm(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact entry
        Contact::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function index(Request $request)
{
    // Fetch query parameters for sorting and searching
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'created_at'); // Default sort column
    $sortOrder = $request->input('sort_order', 'desc'); // Default sort order

    // Build the query
    $contacts = Contact::query()
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        })
        ->orderBy($sortBy, $sortOrder)
        ->paginate(10);

    // Maintain query string during pagination
    $contacts->appends(['search' => $search, 'sort_by' => $sortBy, 'sort_order' => $sortOrder]);

    return view('messages', compact('contacts', 'search', 'sortBy', 'sortOrder'));
}

}
