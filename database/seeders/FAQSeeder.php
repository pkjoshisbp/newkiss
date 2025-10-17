<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQ;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            // General Questions
            [
                'question' => 'What age groups do you teach?',
                'answer' => 'We teach all ages from 6 months to adults. Our programs are specifically designed for different age groups: Infant & Toddler (6 months - 2 years), Preschool (2 - 6 years), and School Age & Adults (6+ years).',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'question' => 'How long are the lessons?',
                'answer' => 'Each lesson is approximately 10 minutes long, 5 days a week. Our intensive format is designed for rapid skill acquisition and muscle memory development. This concentrated approach has proven highly effective for teaching survival swimming skills.',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'question' => 'Do you offer group lessons or only private lessons?',
                'answer' => 'We specialize in one-on-one private lessons. This individualized approach allows our instructors to focus completely on each student\'s unique needs, learning pace, and safety. The personalized attention ensures faster progress and better skill retention.',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'question' => 'What should my child bring to lessons?',
                'answer' => 'Bring a well-fitted swimsuit (no floaties or swim aids), and 2-3 towels. We recommend regular swimsuits rather than swim diapers for potty-trained children. Please avoid loose clothing, goggles (initially), or jewelry that could pose safety risks.',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 4,
            ],
            
            // Program Questions
            [
                'question' => 'What is the difference between Survival Swimming and Continuing Education programs?',
                'answer' => 'The Survival Swimming Program (24 lessons) teaches essential self-rescue skills: floating, rolling to breathe, and swimming to safety. The Continuing Education Program (12 lessons) is for students who have completed survival training and focuses on refining stroke technique and building endurance.',
                'category' => 'programs',
                'is_published' => true,
                'sort_order' => 5,
            ],
            [
                'question' => 'How many lessons does my child need?',
                'answer' => 'Our standard Survival Swimming Program is 24 lessons (approximately 5-6 weeks). Every child progresses at their own pace. Some may need additional lessons to master all skills, while others may progress faster. We provide ongoing assessments and recommendations.',
                'category' => 'programs',
                'is_published' => true,
                'sort_order' => 6,
            ],
            [
                'question' => 'Can my child start lessons if they are afraid of water?',
                'answer' => 'Absolutely! Many of our students start with a fear of water. Our certified instructors are trained to work with fearful children using gentle, progressive techniques. We build confidence gradually while teaching essential survival skills. Water fear is common and very manageable with proper instruction.',
                'category' => 'programs',
                'is_published' => true,
                'sort_order' => 7,
            ],
            [
                'question' => 'Will my child cry during lessons?',
                'answer' => 'Some children may cry initially as they adjust to the new experience and learn to be independent in the water. This is a normal part of the learning process. Our instructors are experienced in managing emotions while maintaining a safe, effective learning environment. Most children adjust quickly and begin enjoying their lessons.',
                'category' => 'programs',
                'is_published' => true,
                'sort_order' => 8,
            ],
            
            // Safety Questions
            [
                'question' => 'How do you ensure safety during lessons?',
                'answer' => 'Safety is our top priority. All instructors are ISR certified and maintain constant hands-on supervision. We use proper safety equipment, follow strict safety protocols, and maintain a 1:1 instructor-to-student ratio. Each lesson is carefully structured to build skills progressively while prioritizing student safety.',
                'category' => 'safety',
                'is_published' => true,
                'sort_order' => 9,
            ],
            [
                'question' => 'What if my child gets sick or needs to miss a lesson?',
                'answer' => 'Please notify us as soon as possible if your child is sick or needs to miss a lesson. For health and safety, children with fevers, contagious illnesses, or diarrhea should not attend. We will work with you to reschedule missed lessons based on instructor availability.',
                'category' => 'safety',
                'is_published' => true,
                'sort_order' => 10,
            ],
            
            // Pricing & Logistics
            [
                'question' => 'What is your cancellation policy?',
                'answer' => 'We require 24-hour notice for cancellations. Lessons cancelled with proper notice can be rescheduled based on availability. Same-day cancellations may be subject to full charges unless due to emergency or illness. This policy helps us maintain consistent scheduling for all students.',
                'category' => 'pricing',
                'is_published' => true,
                'sort_order' => 11,
            ],
            [
                'question' => 'Do you offer lessons year-round?',
                'answer' => 'Yes! We offer lessons year-round at our indoor, climate-controlled pool locations. This ensures consistent skill development and maintenance of water safety abilities regardless of the season. Year-round availability also means you can start lessons whenever it\'s convenient for your family.',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 12,
            ],
            [
                'question' => 'Which location should I choose?',
                'answer' => 'We have four convenient locations: Twinsburg, Mayfield, Brooklyn, and Independence. Choose the location that is most convenient for your schedule. All locations offer the same high-quality instruction and follow identical curriculum and safety standards.',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 13,
            ],
            [
                'question' => 'Can parents watch the lessons?',
                'answer' => 'We have different policies at different facilities regarding observation. Some children focus better without parent observation, especially during initial learning phases. We\'ll work with you to determine what\'s best for your child. Many parents find our video updates helpful for tracking progress.',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 14,
            ],
            [
                'question' => 'What makes K.I.S.S. Aquatics different from other swim schools?',
                'answer' => 'We focus specifically on survival swimming and water safety skills using the Infant Swimming Resource (ISR) method. Unlike traditional swim schools that emphasize stroke technique, we teach children what to do if they unexpectedly fall into water - rolling to float, breathing, and swimming to safety. These survival skills provide the foundation for all future swimming development.',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 15,
            ],
            [
                'question' => 'Do I need to stay for the entire lesson?',
                'answer' => 'Parents must remain on the premises during lessons for safety and liability reasons. However, since lessons are brief (10 minutes), many parents use this time to relax in our waiting area. You\'ll be nearby if needed, but your child will work independently with the instructor.',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 16,
            ],
            [
                'question' => 'What temperature is the pool water?',
                'answer' => 'Our pools are maintained at 78-84°F depending on the location and season. This temperature is warm enough to be comfortable for young children while cool enough to maintain alertness and muscle tone during lessons. Warmer water can make children sleepy and less responsive.',
                'category' => 'safety',
                'is_published' => true,
                'sort_order' => 17,
            ],
            [
                'question' => 'How soon after lessons can my child eat?',
                'answer' => 'We recommend waiting at least 30 minutes after eating before lessons to reduce the risk of upset stomach. After lessons, children can eat immediately. Many families find it helpful to bring a healthy snack for after the lesson.',
                'category' => 'safety',
                'is_published' => true,
                'sort_order' => 18,
            ],
        ];

        foreach ($faqs as $faq) {
            FAQ::create($faq);
        }
    }
}
