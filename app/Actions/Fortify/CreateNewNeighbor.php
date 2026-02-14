<?php

namespace App\Actions\Fortify;

use App\Concerns\PasswordValidationRules;
use App\Models\Neighbor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewNeighbor implements CreatesNewUsers
{

    use PasswordValidationRules;

    public function create(array $input)
    {
        Validator::make($input, [
            'full_name' => ['required','string','max:255'],
            'dni' => ['required','string','max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Neighbor::class),
            ],
            'password' => $this->passwordRules(),
            'phone' => ['nullable','string','max:255']

        ])->validate();

        $neighbor = Neighbor::create([
            'full_name' => $input['full_name'],
            'dni' => $input['dni'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'] ?? null,
            'is_active' => true
        ]);

        return $neighbor;
    }



}
