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

        $index = 1;

        while ($index < 60)
        {
            $data[] = [
                'photo' => '',
                'description' => ''
            ];

            $index++;
        }

        $users = $this->table('posts');
        $users->insert($data)->saveData();
    }
}
