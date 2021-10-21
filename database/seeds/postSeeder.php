<?php

use App\BlogPost;
use App\TrainingVideo;
use Illuminate\Database\Seeder;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post =  new BlogPost();
        $post->heading = 'Heading';
        $post->description = 'Description';
        $post->image = 'default-property.png';
        $post->save();

        $video = new TrainingVideo();
        $video->url = 'google';
        $video->description = 'This is a test';
        $video->image = '';
        $video->type = 1;
        $video->save();

        $video = new TrainingVideo();
        $video->url = 'google';
        $video->description = 'This is a test';
        $video->image = '';
        $video->type = 2;
        $video->save();
    }
}
