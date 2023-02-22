@extends('parent')
@section('content')
      <main id="main">
         <!-- ======= Breadcrumbs ======= -->
         <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
               <ol>
                  <li><a href="{{route('avrt.home')}}">Home</a></li>
                  <li>Faq</li>
               </ol>
               <h2>Faq</h2>
            </div>
         </section>
         <!-- End Breadcrumbs -->
         <!-- ======= Frequently Asked Questions Section ======= -->
         <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Frequently Asked Questions</h2>
               </div>
               <div class="faq-list">
                  <ul>
                      @forelse($faqs as $fq)
                     <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">{{$fq->question}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                            {!! $fq->answer !!}
                          </div>
                     </li>
                     @empty
                       <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">How Does Social Media Influence Alcoholism? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                           <p>
                              When you see an advertisement on your social network for a new food product or drink, you feel the need to buy it because of its magnetism and the advantages it will give you. According to a study, the more online ads people see on their social accounts, the more likely they are to run to a nearby bar or grocery store to consume alcoholic beverages. Social networking can promote the habit of drinking and attract more people to join.
                           </p>
                           <P>Seeing a lot of social media ads on alcoholic beverages can cause a relapse. It can also waste all the hard work you have done to achieve sobriety. Alcoholic beverage companies organize contests, giveaways, and games to engage and get new followers on their social media accounts. These companies offer cash and rewards like sports gear and tickets to winners. Having alcoholic beverage ads flooding your social media accounts can threaten your sobriety by luring you to buy a beer and either start or relapse your alcoholism.</P>
                        </div>
                     </li>
                     @endforelse
                     <!--<li data-aos="fade-up" data-aos-delay="200">-->
                     <!--   <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">What are the physical signs of drug addiction or abuse?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
                     <!--   <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">-->
                     <!--      <p>-->
                     <!--         The physical signs of drug abuse or addiction can vary. It depends on the person and the drug that is being abused. Each drug has short-term or long-term physical effects. For example, cocaine increases heart rate and blood pressure; on the other hand, heroin may slow the heart rate and reduce respiration. How quickly you become drug addicted depends on several factors, such as your age, gender, and environment, among others. While one person may become addicted after a few uses of drugs, another person may abuse it one or many times and suffer no ill effects. However, drug addiction is treatable.-->
                     <!--      </p>-->
                     <!--      <p>When a person is regularly seeking and using drugs, then he or she probably is addicted to drugs. Drug addiction can be effectively treated with medications and behavioral therapies. Treatment will vary for each person depending on the type of drug he or she is using. </p>-->
                     <!--   </div>-->
                     <!--</li>-->
                     <!--<li data-aos="fade-up" data-aos-delay="300">-->
                     <!--   <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">How Do I Avoid Substituting Addiction? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
                     <!--   <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">-->
                     <!--      <p>-->
                     <!--         Once you start getting drug addiction treatment, you learn new skills. You surround yourself with people who understand what it’s like to be addicted to drugs and alcoholic beverages. Recovery from alcoholism or drug addiction is an inner challenge. One of the most common substitutes in recovery is food. Because we have to eat every day, it is not something we think about.-->
                     <!--      </p>-->
                     <!--      <p>If a person is not drinking or using drugs, then he/she is easy to reach for cookies, cake, or candies. It is crucial to admit when you substitute a drug with a different substance that is unhealthy. This is the first step to seeking help before the situation gets out of hand. </p>-->
                     <!--   </div>-->
                     <!--</li>-->
                     <!--<li data-aos="fade-up" data-aos-delay="400">-->
                     <!--   <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Should I Plan a Sober Holiday? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
                     <!--   <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">-->
                     <!--      <p>-->
                     <!--         Going on vacation is crucial for sober people as much as anyone else. Making a holiday plan in advance is key to ensuring lasting recovery and not risking relapse. You shouldn’t go to cities known for their partying reputations to protect the recovery. Sober vacations can help you spend more of your time having fun. Make sure to bring a friend along on holiday. Traveling with a friend can be fun, and it can also ensure you stay sober. Keep in mind to choose a person who is responsible and considerate of your feelings and needs. You want to stay sober on vacation without worrying too much.-->
                     <!--      </p>-->
                     <!--   </div>-->
                     <!--</li>-->
                     <!--<li data-aos="fade-up" data-aos-delay="500">-->
                     <!--   <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Is Cynicism Dangerous in Sobriety? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
                     <!--   <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">-->
                     <!--      <p>-->
                     <!--         No, cynicism can keep you on the straight and narrow path. It will help you see things as they are, not as they should be. The problem arises when you become cynical about everything and find it hard to trust anyone else. Becoming overly cynical means you may be at risk of hurting the recovery. Too much cynicism can be harmful to your overall health and recovery. For example, if a person is too cynical, he/she might refuse help from recovery programs. They can stop spending too much time with people and isolate themselves.-->
                     <!--      </p>-->
                     <!--      <p>In addition, excessive cynicism can lead to depression or anxiety about trying to connect and trust others. It can also lead to inflammation and an increased risk of heart disease. On the other hand, a little cynicism can be a good thing. It helps people feel better in recovery. </p>-->
                     <!--   </div>-->
                     <!--</li>-->
                     <!--<li data-aos="fade-up" data-aos-delay="500">-->
                     <!--   <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-6" class="collapsed">How do the treatment programs help patients recover from addiction? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
                     <!--   <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">-->
                     <!--      <p>-->
                     <!--         Stopping drug use is the first step of a long and complicated recovery process. When a person enters treatment, drug or alcohol addiction has often caused severe issues in their lives. Addiction disrupts their health and relations with their family, work, and community. That’s why treatment programs should address the whole person’s needs to succeed. The programs should offer services that meet patients’ specific medical, mental, social, and legal needs to help them recover.-->
                     <!--      </p>-->
                     <!--   </div>-->
                     <!--</li>-->
                     <!--<li data-aos="fade-up" data-aos-delay="500">-->
                     <!--   <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-7" class="collapsed">How Do I Stay Sober? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
                     <!--   <div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">-->
                     <!--      <p>-->
                     <!--         Sobriety means not being under the addiction to a substance. If you’re in recovery from a substance, you should know how much work it took to achieve sobriety. You must focus on recovery and developing coping skills and habits that support overall health and wellness. Stop using alcohol or drugs and avoid going to bars. A crucial part of preventing relapse is identifying the people, places, things, and situations that bring out thoughts or cravings associated with substance use. Once you understand the risks, creating a plan to prepare for or avoid them will become easy.-->
                     <!--      </p>-->
                     <!--   </div>-->
                     <!--</li>-->
                  </ul>
               </div>
            </div>
         </section>
         <!-- End Frequently Asked Questions Section -->
      </main>
@endsection
