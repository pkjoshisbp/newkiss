<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Program Rules',
                'slug' => 'rules',
                'content' => '
                    <div class="rules-content">
                        <h3 class="text-primary mb-4"><i class="fas fa-clipboard-list me-2"></i>Lesson Guidelines</h3>
                        
                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-clock me-2"></i>1. Punctuality</h5>
                            <p>Please arrive 5 minutes before your scheduled lesson time. Late arrivals may result in shortened lesson time to maintain the schedule for other students.</p>
                        </div>

                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-swimming-pool me-2"></i>2. Swim Attire</h5>
                            <p>Children must wear a properly fitted swimsuit. <strong>NO swim diapers, floaties, or water wings allowed.</strong> These devices interfere with learning proper swimming mechanics and survival skills.</p>
                        </div>

                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-utensils me-2"></i>3. Food & Meals</h5>
                            <p>Do not feed your child for at least 1 hour before lessons. Swimming on a full stomach can cause discomfort and increase the risk of vomiting in the pool.</p>
                        </div>

                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-thermometer-half me-2"></i>4. Health Requirements</h5>
                            <p>Children with fever, contagious illness, diarrhea, or open wounds should not attend lessons. Please notify us immediately if your child is sick. We will work to reschedule the lesson.</p>
                        </div>

                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-bed me-2"></i>5. Rest & Sleep</h5>
                            <p>Ensure your child is well-rested before lessons. Tired children have difficulty focusing and learning. Try to schedule lessons around nap times.</p>
                        </div>

                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-eye me-2"></i>6. Parent Observation</h5>
                            <p>Parent observation policies vary by location. Some children learn better without parent observation, especially during initial lessons. Please discuss this with your instructor.</p>
                        </div>

                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-calendar-times me-2"></i>7. Cancellations</h5>
                            <p>Please provide 24-hour notice for cancellations. Lessons cancelled with proper notice will be rescheduled based on availability. Same-day cancellations may be charged the full lesson fee.</p>
                        </div>

                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-medal me-2"></i>8. Practice & Retention</h5>
                            <p>Daily consecutive lessons are essential for rapid skill acquisition. Missing lessons can slow progress. If you must take a break from lessons, please discuss with your instructor.</p>
                        </div>

                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-home me-2"></i>9. Pool Safety at Home</h5>
                            <p><strong>IMPORTANT:</strong> Swimming lessons are NOT a substitute for supervision. Even after completing our program, children must ALWAYS be supervised around water. Install proper barriers and safety equipment at home pools.</p>
                        </div>

                        <div class="rule-section mb-4">
                            <h5 class="fw-bold text-secondary"><i class="fas fa-hand-paper me-2"></i>10. Behavior Expectations</h5>
                            <p>Children must follow instructor directions for their safety. Parents/guardians must remain on premises during lessons. Disruptive behavior by family members may result in lesson termination.</p>
                        </div>

                        <div class="alert alert-warning mt-5">
                            <h5 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Drowning Prevention</h5>
                            <p class="mb-0">Drowning is the leading cause of accidental death for children ages 1-4. While our program teaches critical survival skills, <strong>NO child is drown-proof</strong>. Layers of protection (supervision, barriers, alarms, and swimming skills) are essential to prevent tragedy.</p>
                        </div>

                        <div class="text-center mt-5 p-4 bg-primary text-white rounded">
                            <h4 class="mb-3">Questions About Our Rules?</h4>
                            <p class="mb-3">We\'re here to help ensure a safe and successful learning experience for your child.</p>
                            <a href="/contact" class="btn btn-light btn-lg"><i class="fas fa-envelope me-2"></i>Contact Us</a>
                        </div>
                    </div>
                ',
                'meta_title' => 'Program Rules - K.I.S.S. Aquatics',
                'meta_description' => 'Review our program rules and guidelines to ensure a safe and productive swimming lesson experience for your child.',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'About Our Drowning Statistics',
                'slug' => 'drowning-statistics',
                'content' => '
                    <div class="statistics-content">
                        <h3 class="text-danger mb-4"><i class="fas fa-exclamation-circle me-2"></i>Drowning: A Silent Killer</h3>
                        
                        <div class="alert alert-danger">
                            <h4 class="alert-heading fw-bold">Critical Facts:</h4>
                            <ul class="mb-0">
                                <li><strong>Drowning is the #1 cause of accidental death for children ages 1-4</strong></li>
                                <li>It takes less than 2 minutes for a child to drown</li>
                                <li>Drowning is often silent - children cannot cry for help</li>
                                <li>70% of drownings occur when the child was not supposed to be near water</li>
                                <li>Most drownings happen within arms reach of safety</li>
                            </ul>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-4 text-center mb-4">
                                <div class="stat-box p-4 bg-light rounded">
                                    <h2 class="display-4 text-danger fw-bold">1,000+</h2>
                                    <p class="text-muted">Children drown each year in the US</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <div class="stat-box p-4 bg-light rounded">
                                    <h2 class="display-4 text-danger fw-bold">88%</h2>
                                    <p class="text-muted">Of drownings occur during supervision</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <div class="stat-box p-4 bg-light rounded">
                                    <h2 class="display-4 text-danger fw-bold">&lt;2 min</h2>
                                    <p class="text-muted">Time it takes for a child to drown</p>
                                </div>
                            </div>
                        </div>

                        <h4 class="text-primary mt-5 mb-3">Why K.I.S.S. Aquatics Matters</h4>
                        <p>Our survival swimming program teaches children the skills they need to save their own lives. We focus on:</p>
                        <ul>
                            <li>Self-rescue techniques: Rolling to float, breathing, and swimming to safety</li>
                            <li>Fully-clothed swimming practice for real-world scenarios</li>
                            <li>Confidence and competence in unexpected water situations</li>
                            <li>Life-saving skills that become automatic through muscle memory</li>
                        </ul>

                        <div class="bg-success text-white p-4 rounded mt-4">
                            <h5 class="mb-3"><i class="fas fa-shield-alt me-2"></i>Layers of Protection</h5>
                            <p class="mb-0">Swimming skills are one critical layer. Also implement: proper supervision, pool barriers, door/pool alarms, life jackets for boating, and CPR knowledge.</p>
                        </div>
                    </div>
                ',
                'meta_title' => 'Drowning Statistics & Prevention - K.I.S.S. Aquatics',
                'meta_description' => 'Learn about drowning statistics and why survival swimming skills are critical for children\'s safety.',
                'is_published' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(
                ['slug' => $page['slug']],
                $page
            );
        }
    }
}
