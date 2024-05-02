<?php

namespace App\Rules;

use App\Models\Track;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class MaxTracksPerUser implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        # validate --> current user no of tracks are less than 3 --> max tracks= 3
        $user = Auth::id();
        $user_track_count = Track::where('owner_id',$user )->count();
        if($user_track_count> 2){
            $fail("User can create 3 tracks only ");
        }

    }
}
