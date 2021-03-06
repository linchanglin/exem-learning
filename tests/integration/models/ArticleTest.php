<?php

use App\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;



class ArticleTest extends TestCase
{
    use DatabaseTransactions;

    function test_it_fetches_trending_articles()
    {
        //Given
        factory(Article::class,2)->create();

        factory(Article::class)->create(['reads' => 10]);

        $mostPopular = factory(Article::class)->create(['reads' => 20]);

        //when

        $articles = Article::trending();


        //Then

        $this->assertEquals($mostPopular->id,$articles->first()->id);

        $this->assertCount(3,$articles);


    }
}