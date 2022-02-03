<?php


use Phinx\Seed\AbstractSeed;

class PostSeeder extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'photo' => '',
                'description' => '',
            ]
        ];

        $users = $this->table('posts');
        $users->insert($data)->saveData();
    }
}
