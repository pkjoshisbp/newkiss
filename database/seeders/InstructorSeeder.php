<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructors = [
            [
                'name' => 'Michelle Alpern',
                'title' => 'Founder & Lead Instructor',
                'image' => '/images/instructors/michelle-alpern.jpg',
                'location' => 'All Locations',
                'email' => 'kissaquatics.com@gmail.com',
                'bio' => 'Highly-trained instructor with expertise in infant and children swimming. Passionate about water safety and recognizing the differences in each child.',
                'description' => "As a highly-trained instructor, Michelle's background offers a wide variety of teaching techniques. This allows her to fulfill her ultimate goal of providing each child with a positive water experience while teaching the necessary principles to be safe in and around water.

I am privledged to be part of the Infant Aquatics team and to add this valuable technique to my skills. I am passionate when it comes to infant and children swimming and water safety. I have studied to recognizing the differences in each child and teach to each individual's need. Today, I am continuously honing my skills by learning new and innovative ways of teaching swimming from other instructors in the aquatics field.

Nothing compares to what I am now doing. I feel I have found a job like no other! I enjoy working with children, watching them conquer their fears, learning to swim, and gaining confidence. This confidence extends well beyond the swimming environment and in many cases improves their overall development. Moreover, in addition to potentially preventing a serious aquatic accident, I also enjoy the special bond that develops between myself and each child in my swim program. My young students never cease to amaze me with their aquatic abilities and their love for the water.

Over the years, I have received calls and letters from parents whose children have experienced an aquatic accident. Whether at a pool, lake, or hot tub, parents are so relieved to find their children have saved themselves! \"The lessons really work!\" I enjoy real satisfaction working with children and watching them achieve success--it is the reward for all my efforts. I look forward to waking up and going to work every day! I want to thank you for your interest in Kiss Swim/Kiss Aquatics and I hope that you will take the steps to give your child the edge that could possibility save his/her life. DISCOVER THE DIFFERENCE OUR SWIM INSTRUCTION CAN MAKE IN YOUR CHILD'S LIFE!

Please feel free to email or call with any questions. I look forward to hearing from you! Happy swimming!",
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Jeff Alpern',
                'title' => 'Instructor',
                'image' => '/images/instructors/jeff-alpern.jpg',
                'location' => 'All Locations',
                'email' => 'kissaquatics.com@gmail.com',
                'bio' => 'WSI certified instructor who loves working with kids. Motivated by teaching swimming as an equalizer for ALL children.',
                'description' => "The kids call me \"Mr. Jeff\". Teaching has always been a passion of mine. While in college, my plan was to become a history professor, but family obligations drew me into our family retail business. Although, I was not in a classroom, I was able to teach retail business concepts to hundreds of young adults.

I have enjoyed swimming all my life. As a young child with traditional lessons at our local pools and later, became WSI certified in college. I learned about Infant Aquatics while doing research for my wife, Michelle.

We chose this program because of the excellent training it provides for instructors and for the education it teaches children! My first exposure to this program was in Florida, where Michelle did her training. I was sitting on deck observing a lesson, which I thought was an 18 month old child because of his size. I learned he was much older. . . he has Brittle Bone disease. While watching his lessons, I was overwhelmed by how much he was accomplishing! I then realized swimming is an equalizer for ALL children, no matter the challenges of life. That experience motivated me to become an instructor with KISS AQUATICS.

I love working with the kids! From the first lesson of adjustment. . . to confidence in their own abilities! Mitchell (age 3) says it best . . . \"I'm doin' it, Mr. Jeff!\"

Teaching this technique is a gift. I am privledged to work with kids everyday and educate little ones in safety and survival swim techniques. I look forward to working working with you and your children!",
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Noah Alpern',
                'title' => 'Instructor',
                'image' => '/images/instructors/noah-alpern.jpg',
                'location' => 'All Locations',
                'email' => 'kissswimna@gmail.com',
                'bio' => 'Trained in culinary arts and EMT, brings disciplined teaching methods from sports training to swimming instruction.',
                'description' => "Every parent wishes only the best for their children. . . in school, in sports, in life. Noah feels the Infant Aquatics swim-float-swim technique teaches your child the best in aquatic safety and results in safer, happy little swimmers.

I am excited to teach your children water safety and survival techniques. Growing up in Cleveland, Ohio, I was involved in all sports, but basketball became my true passion. In my training, the success and skills learned came from consecutive days of practice and skills repeated over and over again. I take those same successful teaching methods to teaching children to swim.

Before becoming an instructor, I trained in culinary institutes in the states as well as Italy, and I also took EMT training.

The intensive training required by my Kiss Aquatics certification enables me to safely and effectively teach infants and young children lifesaving water skills. The sequence of skills taught to very young students is a natural progression to becoming happy and successful swimmers. It is very exciting to witness the aquatic learning process children go through, from being totally helpless in the water to becoming confident, capable swimmers in weeks, not years.

Come discover how to give a gift that will last a lifetime. . . the ability to swim and be safer around the water.",
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Shanée Alpern',
                'title' => 'Instructor',
                'image' => '/images/instructors/shanee-alpern.jpg',
                'location' => 'Twinsburg',
                'email' => 'kiss.swim.twin@gmail.com',
                'bio' => 'Arizona native with lifelong water experience. Certified in CPR/First Aid/AED, passionate about preventing drowning accidents.',
                'description' => "My name is Shaneé Alpern. I was raised in sunny Arizona. Growing up, my family spent most of our free time on a boat, at the lake and river, or in our back yard swimming pool. Swimming and water safety was a must for these fun pastimes. I was on the swim team in junior high school so I became a strong swimmer. Since I have lived around water my entire life, I had to save children from drowning twice before I graduated high school. One was a cousin and the other was a close friend's child. This shows how quickly, in seconds, something can happen in the blink of an eye or the turn of a back!

Families spend their free time around water which is a fun; yet can be a fatal sport. The necessity of learning water safety is critical at a young age to prevent dire situations. Drowning is silent. There are usually no warnings such as screaming or splashing. If I can save one child's life, my job is a success!

Utilizing the swim-float-swim technique, results are seen in weeks, not years! My training included over 150 hours of hands-on, pool instruction with Michelle Alpern. I continue to grow with every child as each one teaches me something new. It is always exciting for me to watch an unsure beginner morph into a confident and able swimmer! Their milestones are my own as well!

I am certified in adult, children, and infant CPR/First Aid/AED by the American Heart Association.

Drowning is the leading cause of death for infants and young children between the ages of 1-4 (U.S. Centers for Disease Control and Prevention).

Please feel free to email or call with any questions. I look forward to hearing from you! Happy swimming!",
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Jordan Alpern',
                'title' => 'Instructor',
                'image' => '/images/instructors/jordan-alpern.jpg',
                'location' => 'Twinsburg',
                'email' => 'kiss.swim.twin@gmail.com',
                'bio' => 'Arizona State graduate with BA in Business/Economics. Former lifeguard and pool service owner, now teaching swimming to families.',
                'description' => "Hi, my name is Jordan Alpern and I am a proud member of the KISS Swim family. I am a native Clevelander. I graduated from Arizona State with a BA in Business/Economics. My time in Phoenix is where I met my beautiful wife Shaneé whom I get the pleasure of working side by side in this family business.

I have worn many 'hats' in my professional life, serving & bartending, wine sommelier, precious coin sales… but I have always migrated back to the water. I was a lifeguard at a country club in high school and I owned a swimming pool cleaning and repair company for 10 years in Phoenix.

Having a new baby girl this year (2015) and starting a family has placed a new purpose and path in life for me. Teaching swimming to little ones is a very special venture. There is something fantastic in the moment when you see a child gain a skill. Be it from learning a stroke, perfecting their roll and floating on their back, or simply by learning to love swimming and saying that they want to do it by themselves.

Living on a planet where 2/3's of our world is covered by water, swimming is arguably one of the most necessary of skills. From an early age of bathing in a tub, to pool parties at friends' homes, or travelling to the beach, interaction with water is everywhere. I am looking forward to swimming with your little ones.

Please feel free to email or call with any questions. I look forward to hearing from you! Happy swimming!",
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Desarae Kleckner',
                'title' => 'Instructor',
                'image' => '/images/instructors/desarae-kleckner.jpg',
                'location' => 'Twinsburg',
                'email' => 'kiss.swim@gmail.com',
                'bio' => 'Former stay-at-home mom and Assistant Scoutmaster. Lifelong swimmer passionate about teaching water survival skills.',
                'description' => "Hello, my name is Desarae Kleckner, but you can call me \"Dez\". I have been married for 20 years; we have two beautiful children, Zade and Harlie, as well as 3 German Shepherds. I love the great outdoors and can't get enough of camping and hiking. I loved it so much that I became involved with my sons Boy Scout Troop in Twinsburg, and I am currently the Assistant Scoutmaster.

Up until a last year ago, I was a stay at home Mom for 14 years. I reached a point in my life where it was time to do something I always wanted to do. Ever since my Mother put me in the pool at 9 months old, I've been in love with swimming. I enjoy working with children, and seeing the look on their faces when they accomplish something for the first time. Fate should have it, I found the K.I.S.S. Company. I am amazed by the techniques and philosophy behind this proven program. I can't wait to apply these skills and teach your children to survive in a pool.",
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Kirtis',
                'title' => 'Instructor',
                'image' => '/images/instructors/kirtis.jpg',
                'location' => 'All Locations',
                'email' => 'kiss.swim@gmail.com',
                'bio' => 'Ohio University graduate with degrees in Physical Education and Coaching. Competitive swimmer and USA Swimming coach.',
                'description' => "Growing up in Cincinnati, I spent most of my summer days at the pool with friends and family. Eventually I swam on the swim team, became a lifeguard and swim lesson teacher. I swam competitively for Ohio University and graduated with degrees in Physical Education and Coaching. I moved to the Cleveland area to professionally coach swimming in 2012. I have worked with swimmers, developing them from learn-to-swim, to nationally ranked within USA Swimming. My favorite part of coaching has been seeing the kids consistently work hard and focus on small goals to achieve beyond their expectations.

I had the opportunity to see Michelle and the KISS family teaching over the years. It amazed me how the infants would learn to roll over to their back to float within weeks. I took the opportunity to learn about Infant Aquatics through KISS Aquatics so I can have time for family. I am excited to teach young ones to be safe and confident around the water, so the whole family can have peace of mind when bonding near an aquatic environment.",
                'order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($instructors as $instructor) {
            Instructor::create($instructor);
        }
    }
}
