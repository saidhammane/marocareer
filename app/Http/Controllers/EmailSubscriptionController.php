<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\EmailSubscription;

    class EmailSubscriptionController extends Controller
    {
        public function subscribe(Request $request){
            EmailSubscription::create($request->all());
            return view('callCenter\thankyou');
        }
    }
