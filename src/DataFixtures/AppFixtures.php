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
            'Phương pháp luận biện chứng duy vật về ngành nghề hot nhất trên thị trường tuyển dụng IT hiện nay: DevOps.  Xin chào các bạn, cũng lâu rồi mình không Phương pháp luận biện chứng duy vật về ngành nghề hot nhất trên thị trường tuyển dụng IT hiện nay: DevOps.  Xin chào các bạn, cũng lâu rồi mình không',
            'Những gì sắp kể ra ở đây là về hành trình của mình đến với thế giới open source, đây là một dự án làm cho vui nhưng rốt cuộc lại đóng vai trò khá quan Những gì sắp kể ra ở đây là về hành trình của mình đến với thế giới open source, đây là một dự án làm cho vui nhưng rốt cuộc lại đóng vai trò khá quan',
            'Bài viết cung cấp chi tiết về cách mà React render hoạt động, và việc sử dụng Context và Redux ảnh hưởng thế nào tới quá trình render của React. Bài viết cung cấp chi tiết về cách mà React render hoạt động, và việc sử dụng Context và Redux ảnh hưởng thế nào tới quá trình render của React.'
        ];

        for ($i = 0; $i < 10; $i++) {
            foreach ($posts as $j => $content) {
                $post = new Post();
                $post->setContent($content);

                $user = new User();
                $user->setName('user '.$i.$j);
                $user->setEmail('user-'.$i.$j.'@example.com');
                $manager->persist($user);

                $post->setUser($user);
                $manager->persist($post);
            }
        }

        $manager->flush();
    }
}
