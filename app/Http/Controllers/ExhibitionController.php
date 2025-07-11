<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionDetail;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    /**
     * Show the exhibition & sponsorship subscription page.
     */
    public function index()
    {
        return view('exhibition.index');
    }

    /**
     * Handle the initial email subscribe step.
     * Expects JSON { email: "user@company.com" }.
     * Returns JSON { id: subscription_id }.
     */
    public function emailSubscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $subscription = Subscription::create([
            'email' => $validated['email'],
        ]);

        return response()->json([
            'message'         => 'Successfully subscribed.',
            'id'              => $subscription->id,
        ]);
    }

    /**
     * Handle the full details submission from the modal.
     * Expects JSON payload:
     * {
     *   subscription_id: int,
     *   name: string,
     *   company: string,
     *   job_title: string,
     *   phone: string,
     *   traffics: array of strings,
     *   verticals: array of strings
     * }
     */
    public function subscribeDetails(Request $request)
    {
        $validated = $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'name'            => 'required|string|max:255',
            'company'         => 'required|string|max:255',
            'job_title'       => 'required|string|max:255',
            'phone'           => 'required|string|max:50',
            'interest_types'   => 'required|array|min:1',
            'interest_types.*' => 'in:exhibition,sponsorship',
            'traffics'        => 'required|array|min:1',
            'traffics.*'      => 'string',
            'verticals'       => 'required|array|min:1',
            'verticals.*'     => 'string',
        ]);

        SubscriptionDetail::create([
            'subscription_id' => $validated['subscription_id'],
            'name'             => $validated['name'],
            'company'          => $validated['company'],
            'job_title'        => $validated['job_title'],
            'phone'            => $validated['phone'],
            'interest_types'   => json_encode($validated['interest_types']),
            'traffic_sources'  => json_encode($validated['traffics']),
            'verticals'        => json_encode($validated['verticals']),
        ]);


        return response()->json([
            'message' => 'Details saved successfully.',
        ]);
    }
}
