@extends('parent')
@section('content')
      <style>
          #about ul li {
  margin-top: 15px;
  font-size: 18px;
  font-weight: 500;
}
p {
  line-height: 32px;
}
#hero {
  width: 100%;
  height: 66vh;
  background: #fcbd0000;
    background-image: none;
  background-image: url('https://thetestingserver.com/avrt/public/img/avrt-bg.jpg');
  background-position: 100%;
  background-repeat: no-repeat;
}
 .custom-breadcrumb{
        background-position:right;
            height: 70vh;
            padding-top: 115px;
    }
@media only screen and (max-width: 990px){
#hero h1 {
    color: #fafafa;
}
    #hero h2 {
    color: rgb(255 255 255);
    margin-bottom: 50px;
    font-size: 22px;
}
}
@media(min-width:1500px){
     .custom-breadcrumb{
       
           padding-top: 210px;
            
    }
}
@media(max-width:1180px){
      .custom-breadcrumb{
       
            height: 62vh;
            
    }
}
@media(max-width:1024px){
      .custom-breadcrumb{
       
            height: 72vh;
            
    }
}
@media(max-width:912px){
      .custom-breadcrumb{
        background-position:right;
            height: 30vh;
            padding-top: 120px;
    }
}
@media(max-width:820px){
      .custom-breadcrumb{
        background-position:right;
            height: 30vh;
            padding-top: 78px;
    }
}
@media(max-width:768px){
      .custom-breadcrumb{
        background-position:right;
            height: 35vh;
            padding-top: 105px;
    }
}
@media(max-width:767px){
    .custom-breadcrumb h1{
        font-size: 20px;
    }
     .custom-breadcrumb h2{
        font-size: 15px;
    }
   
     .custom-breadcrumb{
        background-position:right;
            height: 38vh;
            padding-top: 78px;
    }
}
@media(max-width:650px){
   
  
   
     .custom-breadcrumb{
        background-position:right;
            height: 39vh;
            padding-top: 78px;
    }
    .custom-breadcrumb h2 {
    font-size: 14px;
}
.custom-breadcrumb h1 {
    font-size: 20px;
}
}
@media(max-width:550px){
   
  
   
     .custom-breadcrumb{
        background-position:right;
            height: 36vh;
            padding-top: 78px;
    }
    .custom-breadcrumb h2 {
    font-size: 12px;
}
.custom-breadcrumb h1 {
    font-size: 18px;
}
}
@media(max-width:450px){
   
  
   
     .custom-breadcrumb{
        background-position:right;
            height: 26vh;
            padding-top: 78px;
    }
    .custom-breadcrumb h2 {
    font-size: 12px;
}
.custom-breadcrumb h1 {
    font-size: 18px;
}
}
@media(max-width:390px){
   
  
   
     .custom-breadcrumb{
        background-position:right;
            height: 28vh;
            padding-top:85px;
    }
    .custom-breadcrumb h2 {
    font-size: 12px;
}
.custom-breadcrumb h1 {
    font-size: 17px;
}
}
@media(max-width:375px){
   
  
   
     .custom-breadcrumb{
        background-position:right;
            height: 34vh;
            padding-top:85px;
    }
    .custom-breadcrumb h2 {
    font-size: 12px;
}
.custom-breadcrumb h1 {
    font-size: 17px;
}
}
@media(max-width:320px){
   
  
   
     .custom-breadcrumb{
        background-position:right;
            height: 39vh;
            padding-top:85px;
    }
    .custom-breadcrumb h2 {
    font-size: 12px;
}
.custom-breadcrumb h1 {
    font-size: 17px;
}
}
    
      </style>
    
      <!--<section id="hero" class="d-flex align-items-center landing-banner">-->
      <!--   <div class="container">-->
      <!--      <div class="row">-->
      <!--         <div class="col-lg-7 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1">-->
      <!--            <h1>We live and learn and love to live</h1>-->
      <!--            <h2 class="w-75">We found this key beside the slippery path of daily sobriety.</h2>-->
                 
      <!--         </div>-->
              
      <!--      </div>-->
      <!--   </div>-->
      <!--</section>-->
      
      <section class="custom-breadcrumb"  style="@if(empty($message)) background-image:url({{url('storage/'.$message->banner_image)}}) @else background-image:url(https://thetestingserver.com/avrt/public/img/avrt-bg.jpg);background-size:cover; @endif">
         <div class="container">
            <div class="row">
               <div class="col-lg-7 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1">
                  <h1 class="text-white">@if(!empty($message)) {{$message->banner_title}} @else We live and learn and love to live @endif </h1>
                  <h2 class="w-75 text-white">@if(!empty($message)) {{$message->banner_subtitle}} @else We found this key beside the slippery path of daily sobriety. @endif</h2>
                 
               </div>
              
            </div>
         </div>
      </section>
      
      
      <main id="main" class="landing-page">
        
       
       
         <section id="skills" class="skills">
   <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="row">
       
         <div class="col-lg-12 pt-4 pt-lg-0 content aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
             @if(!empty($message))
             
             {!! $message->content_description !!}
             
             @else
                      <h3>Sobriety During Holiday Festivities: Drugs Unused Are Harmless</h3>
                    <p class="">Thanks for stopping by avrt.com to get your 2022 Merry Christmas from us. To follow is a
        discussion about sobriety during holiday festivities. We also wish you the happiest new year for
        all in your family. Please accept our little gift for sober addicts and their families, The AVRT®
        Freedom Rap. It's not a Christmas carol but a rip-rap through troubled times, making dents in
        the base nature of sobriety addiction. Read the Rap, feel the words in your bones, get the feel of
        something new, for you, for them, the ones who care for you, and so on.
        </p>
           <p>As you likely know, Lois and I have devoted our lives to open the gate to life after sobriety.
When we founded Rational Recovery® in 1986, we had no idea of the crooked path we would
travel, and of the discoveries, we would make as we widened the narrow path of Addictive Voice
Recognition Technique® (AVRT®). Today we hold high AVRT®, the shining key of liberty that
unlocks the gate from the Not-OK-Corral. The key is free as the air we breathe, to be freely
turned by the human spirit while protecting those who choose their home instead away from
home, without the risks of free-range living.
</p>
           
           
           <p>We said goodbye to Rational Recovery®, for the rules of rationality have nothing to do with
principled abstinence; without disease, there is nothing from which to recover. AVRT® has
revealed to us that feel-good drugs are harmless until finally used. The harm emerges during the
intervals between using doctrine-disoriented sober, rim-rolling into gratifying relapse up into
supreme pleasures that exceed our earthly survival drives, family bonds included. In that state,
anything goes, including the next use. Drugs unused are harmless, and there is no place to hide.
We live and learn and love to live in the knowledge that AVRT® will endure our times and in the
times of its legacy to come. We found this key beside the slippery path of daily sobriety, not lost
by someone else, but put there purposely for you to go and use no more, for all eternity.
</p>
           
           <p>Jack and Lois Trimpey</p>
           
            <h3>New Gospel Of Victory Over The Base, Animal Nature Of The Human Condition
</h3>
           <p>Provided you are not under the influence of a feel-good drug, this simple exercise may be all you
need to throw the hook of your favorite fix totally. This is especially true if you have been present
at sobriety support groups of any kind and do not like or benefit from it, or find it objectionable
on personal grounds. Being there means you care. That doesn't mean you belong there. You
want out of the darkness of the high life and the entrapment of sobriety doctrines. AVRT® is
ready-made for you.
</p>
           
           <p>The AVRT® Freedom Rap is an example of structurally sound, Addictive Voice Recognition
Technique® (AVRT®), def: The lore of independent recovery from sobriety addiction in a brief,
consumer-ready, service-marked, educational format. AVRT® is as free as the air we breathe, a
new gospel of victory over the base, animal nature of the human condition.
</p>
<p>Here is your first serving of AVRT®, the AVRT® Freedom Rap. It is a fast Q&A dialogue. As you
learn it, study the pronouns and the progression from uncertainty to unyielding. Get the feeling
and conviction in your guts and bones. Listen to your Addictive Voice cutting in to mess you up.
Feel it cringe at "never." Feel it loving, "Yes, I love to use a lot!" The AVRT® Freedom Rap is
DC voltage that makes a deep impression upon feelings toward feelgood drugs. Read it like
you’re taking the hungry Beast by the horns. Then read it out loud and feel the strength of your
human spirit over your animal body. Give it hell. It deserves some back.
</p>
             
             @endif
   

         </div>
      </div>
   </div>
</section>


<section id="about" class="about py-3">
   <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="section-title p-0">
          @if(!empty($message))
         <h2>{{$message->rap_title}}</h2>
         @else
          <h2>The AVRT® Freedom Rap</h2>
         @endif

      </div>
      <div class="row content justify-content-center">
         <div class="col-lg-12 col-md-12 col-12 pt-3 text-center">
             @if(!empty($message))
             
                {!! $message->rap_content !!}
             @else
               
            <ul class="mt-2">
               <li>Do you love to use a lot?</li>
               <li>Yes! I love to use a lot.</li>
               <li> Do you love to drink a lot?</li>
                 <li>Drink a lot, use a lot:</li>
               <li>You really stand to lose a lot.</li>
              
            </ul>
            
              <ul class="mt-5">
               <li>Do you want to use again?
</li>
               <li>Yes! I want to use again.
</li>
               <li>Do you want some booze again?</li>
                 <li>Yes! I want some buzz again!</li>
               <li>Use again, buzz again:</li>
                <li>I think I’m gonna lose again.</li>
              
            </ul >
            
              <ul class="mt-5">
               <li>Will you ever use again?
</li>
               <li>I do not want to use again.
</li>
               <li> I asked you, “Will you use again?”</li>
                 <li>Use again; lose again.</li>
               <li>I will never lose again.</li>
              
            </ul>
            
            <ul class="mt-5">
               <li>Do you hear that voice again?
</li>
               <li>Yes! I hear that voice again,

</li>
               <li>A head-voice says, "I’ll use again!"
</li>
                 <li>Head-voice says I’ll use again?</li>
               <li>Damn! I’ll NEVER use again.
</li>

              
            </ul>
            
            <ul class="mt-5">
               <li>Why not later use again?
</li>
               <li>It’s ALWAYS wrong to use again!

</li>
               <li> Who says, “It’s wrong to use again?”
</li>
                 <li>I SAID IT’S WRONG TO USE AGAIN!
</li>
               <li>Use again? Lose again!
</li>

<li>I'LL NEVER, EVER USE AGAIN!</li>
          
              
            </ul>
            
             <ul class="mt-5">
               <li>NEVER! NEVER!
</li>
               <li>NEVER! NEVER! NEVER!

</li>
               <li> I WILL NEVER USE AGAIN!
</li>
                 <li>My battle finally done.
</li>
               <li>Now I'm going home, sweet home.</li>
              
            </ul>
             
             @endif
          
         </div>
         
      </div>
   </div>
</section>
    
        <section  class="skills">
   <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="row">
       
         <div class="col-lg-12 pt-4 pt-lg-0 content aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
            <h3>Listen.</h3>
            @if(!empty($message))
            {!!  $message->listen_content !!}
            @else
            <p class="">There is no more to AVRT® than this. The AVRT® Freedom Rap gets you the exit from
morbid sobriety if you so choose. It is entirely possible that you are already finished
with feel-good drugs and morbid sobriety. It's up to you to say, and it's easy. Just
recognize all thoughts, intuitions, perceptions, or feelings that support or even suggest
the possible future use of alcohol or other drugs. Those feel-good thoughts are your
Addictive Voice (AV).
</p>
           <p>The AV is the expression of the Beast of addiction, the sole cause of your morbid
condition. Don't try to remove, reply, or run from the voice any more than you would
cut-and-run from a growling dog. Just hear it, but don’t listen to it. It has no voluntary
control, so it has no choice other than go silent and return later on.

</p>
           
           
           <p>You won't be alone, for AVRT® is based upon the most common thread of success in
breaking the chains of feelgood drugs and their entourage of bad company (groups,
shrinks, rehabs). Now, while you’re in motion, get the book. Rational Recovery: The
New Cure for Substance Addiction is at amazon, paperback or kindle, available on 1-day
prime, regular prime, and new (or used with free delivery — total -$5).

</p>
           
           <p>The New Cure will give you a good foundation in state-of-the-art, 1996 Addictive Voice
Recognition Technique® (AVRT®). I wrote it after 20 years, miserably sober, betraying
those I loved.
</p>

<P>We are building a sensational, new avrt.com website behind this construction landing
page. Keep coming back, but not for too long—just until you get the hang of AVRT® and
are building bridges back into the relationships and hearts you’ve broken. Sobriety
doesn't survive at avrt.com unless you choose it.</P>
            @endif
                    
         
         </div>
         
         
         <div class="col-lg-4 col-md-12  ">
                     <div class="mt-4">
                        <a href="https://www.amazon.com/Rational-Recovery-Cure-Substance%20Addiction/dp/0671528580/ref=sr_1_1?s=books&amp;ie=UTF8&amp;qid=1343163824&amp;sr=1-%201&amp;keywords=Rational+Recovery" target="_blank">
                        <img src="{{asset('/img/book-avrt.jpg')}}" class="img-fluid" alt="">
                        </a>
                     </div>
                   
                   
                  </div>
      </div>
   </div>
</section> 
         
      </main>
@endsection