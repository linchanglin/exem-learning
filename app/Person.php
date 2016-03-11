<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['name','email','password'];


    protected $hidden = ['password','remember_token'];

    public function leaveTeam()
    {
        //$this->update(['team_id' => null]);

        $this->team_id = null;

        $this->save();

        return $this;
    }
}
