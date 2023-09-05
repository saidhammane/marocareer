<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailSubscription;

class EmailSubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        EmailSubscription::create($request->all());
        return view('callCenter.thankyou');
    }

    public function SendMail(Request $request)
    {

    }


    public function contact(Request $request)
    {

        return view('contact');
    }

    public function destroy($id)
    {
        try {
            $emailSubscription = EmailSubscription::findOrFail($id);
            $emailSubscription->delete();
            return response()->json(['message' => 'Email subscription deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting email subscription'], 500);
        }
    }


}