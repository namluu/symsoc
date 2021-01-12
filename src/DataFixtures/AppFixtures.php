<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Post;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $posts = [
            [
                'title' => 'Thế nào mới là 1 DevOps thật sự',
                'content' => 'Phương pháp luận biện chứng duy vật về ngành nghề hot nhất trên thị trường tuyển dụng IT hiện nay: DevOps.  Xin chào các bạn, cũng lâu rồi mình không Phương pháp luận biện chứng duy vật về ngành nghề hot nhất trên thị trường tuyển dụng IT hiện nay: DevOps.  Xin chào các bạn, cũng lâu rồi mình không',
            ],
            [
                'title' => 'Open Source Story: Agar.IO Clone',
                'content' => 'Những gì sắp kể ra ở đây là về hành trình của mình đến với thế giới open source, đây là một dự án làm cho vui nhưng rốt cuộc lại đóng vai trò khá quan Những gì sắp kể ra ở đây là về hành trình của mình đến với thế giới open source, đây là một dự án làm cho vui nhưng rốt cuộc lại đóng vai trò khá quan',
                
            ],
            [
                'title' => 'Software Architect: Bad practices',
                'content' => 'Bài viết cung cấp chi tiết về cách mà React render hoạt động, và việc sử dụng Context và Redux ảnh hưởng thế nào tới quá trình render của React. Bài viết cung cấp chi tiết về cách mà React render hoạt động, và việc sử dụng Context và Redux ảnh hưởng thế nào tới quá trình render của React.',
            ]
        ];

        $avatars = [
            'https://avatars1.githubusercontent.com/u/16734662?v=4',
            'https://pbs.twimg.com/profile_images/1136911450776064000/dXJZbdpm_400x400.jpg',
            'https://i.imgur.com/wBrdpOa.jpg'
        ];

        for ($i = 0; $i < 10; $i++) {
            foreach ($posts as $j => $item) {
                $post = new Post();
                $post->setTitle($item['title']);
                $post->setContent($item['content']);

                $user = new User();
                $user->setName('user '.$i.$j);
                $user->setEmail('user-'.$i.$j.'@example.com');
                $user->setAvatar($avatars[$j]);
                $user->setPassword(md5('password'));
                $manager->persist($user);

                $post->setUser($user);
                $manager->persist($post);
            }
        }

        $manager->flush();
    }
}
