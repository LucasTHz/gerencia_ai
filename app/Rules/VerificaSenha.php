<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class VerificaSenha implements Rule
{
    protected $guard = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($guard)
    {
        $this->guard = $guard;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = auth($this->guard)->user();

        $hash = match($this->guard) {
            'estudante' => DB::table('Estudante')->where('id','=' ,$user->id)->value('password'),
            'professor' => DB::table('Professor')->where('id_professor', '=', $user->id_professor)->value('password'),
        };

        return Hash::check($value, $hash);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Senha atual incorreta';
    }
}
