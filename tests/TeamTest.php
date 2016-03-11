<?php

use App\Team;
use App\Person;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamTest extends TestCase
{
    use DatabaseTransactions;

    public function test_a_team_has_a_name()
    {
        $team = new Team(['name' => 'Acme']);

        $this->assertEquals('Acme',$team->name);
    }

    public function test_a_team_can_add_members()
    {
        $team = factory(Team::class)->create();

        $person = factory(Person::class)->create();
        $personTwo = factory(Person::class)->create();

        $team->add($person);
        $team->add($personTwo);

        $this->assertEquals(2,$team->count());

    }

    public function test_a_team_has_a_maximum_size()
    {
        $team = factory(Team::class)->create(['size' => 2]);

        $personOne = factory(Person::class)->create();
        $personTwo = factory(Person::class)->create();

        $team->add($personOne);
        $team->add($personTwo);

        $this->assertEquals(2,$team->count());

        $this->setExpectedException('Exception');

        $personThree = factory(Person::class)->create();
        $team->add($personThree);

    }

    public function test_a_team_can_add_multiple_members_at_once()
    {
        $team = factory(Team::class)->create();

        $persons = factory(Person::class,2)->create();

        $team->add($persons);

        $this->assertEquals(2,$team->count());

    }

    public function test_a_team_can_remove_a_member()
    {
        $team = factory(Team::class)->create(['size' => 2]);

        $persons = factory(Person::class,2)->create();

        $team->add($persons);

        $team->remove($persons[0]);

        $this->assertEquals(1,$team->count());
    }

    public function test_a_team_can_remove_more_than_a_member_at_once()
    {
        $team = factory(Team::class)->create(['size' => 3]);

        $persons = factory(Person::class,3)->create();

        $team->add($persons);

        $team->remove($persons->slice(0,2));

        $this->assertEquals(1,$team->count());
    }



    public function test_a_team_can_remove_all_members_at_once()
    {
        $team = factory(Team::class)->create(['size' => 2]);

        $persons = factory(Person::class,2)->create();

        $team->add($persons);

        $team->restart();

        $this->assertEquals(0,$team->count());

    }

    public function test_when_adding_many_members_at_once_you_still_may_not_exceed_the_team_maximum_size()
    {
        $team = factory(Team::class)->create(['size' => 2]);

        $persons = factory(Person::class,3)->create();

        $this->setExpectedException('Exception');

        $team->add($persons);

    }


























}
