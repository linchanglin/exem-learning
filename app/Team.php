<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected $fillable = ['name', 'size'];

    public function add($persons)
    {

        $this->guardAgainstTooManyMembers($persons);

        $method = $persons instanceof Person ? 'save' : 'saveMany';

        $this->members()->$method($persons);

    }

    public function remove($persons = null)
    {
        if ($persons instanceof Person)
        {
            $persons->leaveTeam();
        }
        else
        {
            return $this->removeMany($persons);
        }
    }

    public function removeMany($persons)
    {
        return $this->members()
            ->whereIn('id', $persons->pluck('id'))
            ->update(['team_id' => null]);
    }


    public function restart()
    {
        return $this->members()->update(['team_id' => null]);
    }

    public function members()
    {
        return $this->hasMany(Person::class);
    }

    public function count()
    {
        return $this->members()->count();
    }

    public function maximumSize()
    {
        return $this->size;
    }

    protected function guardAgainstTooManyMembers($persons)
    {
        $numPersonsToAdd = ($persons instanceof Person) ? 1 : count( $persons);

        $newTeamCount = $this->count() + $numPersonsToAdd;

        if ($newTeamCount > $this->maximumSize())
        {
            throw new \Exception;
        }
    }

}
