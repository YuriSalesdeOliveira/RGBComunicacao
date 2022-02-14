<?php


use Source\Support\Helper;
use Phinx\Seed\AbstractSeed;

class PostSeeder extends AbstractSeed
{
    public function run()
    {
        $data = [];

        $images_list = (new Helper)->listFiles(PATH['storage'] . '/images');

        foreach ($images_list as $image)
        {
            if ((new Helper)->isImage(PATH['storage'] . '/images', $image))
            {
                if ($image === 'default-image.png') { continue; }

                array_push($data, [
                    'photo' => $image,
                    'description' => 'Nome do Álbum Lorem Ipsum Dolor Amed'
                ]);
            }
        }

        $users = $this->table('posts');
        $users->insert($data)->saveData();
    }
}
