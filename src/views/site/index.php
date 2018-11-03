<div id="fullpage" class="index-wrapper">
  <section class="section page-one-2 text-center">
    <h2>Ease your way to teach in China</h2>
    <h3>Find and apply to your dream job in China</h3>
    <h3>through our free personalised application service</h3>
    <input class="job-keyword" />
    <span class="job-search">Search Job</span>
  </section>

  <section class="section page-6 text-center">
    <h2>Our Partnerships</h2>
    <h3>We provide English teaching positions across China</h3>

    <div class="container">
      <div class="swiper-container schools">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <i class="school school-1"></i>
            <i class="school school-2"></i>
          </div>
          <div class="swiper-slide">
            <i class="school school-3"></i>
            <i class="school school-4"></i>
          </div>
          <div class="swiper-slide">
            <i class="school school-5"></i>
            <i class="school school-6"></i>
          </div>
          <div class="swiper-slide">
            <i class="school school-7"></i>
            <i class="school school-8"></i>
          </div>
          <div class="swiper-slide">
            <i class="school school-9"></i>
            <i class="school school-10"></i>
          </div>
          <div class="swiper-slide">
            <i class="school school-11"></i>
            <i class="school school-12"></i>
          </div>
          <div class="swiper-slide">
            <i class="school school-13"></i>
            <i class="school school-14"></i>
          </div>
          <div class="swiper-slide">
            <i class="school school-15"></i>
            <i class="school school-16"></i>
          </div>
          <div class="swiper-slide">
            <i class="school school-17"></i>
            <i class="school school-18"></i>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>

  <section class="section page-four">
    <h2>Featured Jobs</h2>

    <div class="container">
      <div class="job-container">
        <ul class="job-list">

          <?php foreach ($this->params['model'] as $job) {
            ?>
            <a class="job-item" href="/site/jobdetail?id=<?= $job['id']?>">
              <i class="logo job1" style="background-image: url(<?= $job['pic']?>)"></i>
              <div class="desc">
                <label class="name"><?= $job['title']?></label>
                <span class="info"><?= $job['base_title']?></span>
                <span class="info"><?= $job['salary']?></span>
                <span class="info"><?= $job['base_location']?></span>
              </div>
            </a>
              <?php
          } ?>

          <i class="job-item empty"></i>
          <i class="job-item empty"></i>
          <i class="job-item empty"></i>

        </ul>
      </div>
    </div>

    <div class="align-right container">
      <a class="read-more" href="/site/jobvacancy">Read More -></a>
    </div>
  </section>

  <section class="section page-one">
    <h2>Are you an English language teacher?</h2>
    <h3>Then why not come to CHINA?</h3>
    <div class="type-list container">
      <a class="type-item" href="/site/job?key=category&value=Current Vancancies">Current Vancancies</a>
      <a class="type-item" href="/site/job?key=category&value=Graduate Scheme">Graduate Scheme</a>
      <a class="type-item" href="/site/job?key=category&value=Internship">Internship</a>
    </div>
  </section>

  <section class="section page-four-2">
    <h2>Discover China</h2>
    <div class="container">
      <div class="video" id="video">
        <!-- <video controls>
          <source src="/build/images/index/movie.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video> -->
        <iframe class="video-youtube video-1" width="854" height="500" src="https://www.youtube.com/embed/W0SVb327Qqc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <iframe class="video-youtube video-2" width="889" height="500" src="https://www.youtube.com/embed/JmiKWTRoiMk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <iframe class="video-youtube video-3" width="720" height="500" src="https://www.youtube.com/embed/wAEzpwvrveg?ecver=2" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>

      <div class="china">
        <div class="item item-1">
          <i></i>
          <label class="title">Chinese Food</label>
          <label class="type">Product/Service Categories</label>
        </div>

        <div class="item item-2">
          <i></i>
          <label class="title">Online shopping</label>
          <label class="type">Product/Service Categories</label>
        </div>

        <div class="item item-3">
          <i></i>
          <label class="title">Reading time</label>
          <label class="type">Product/Service Categories</label>
        </div>
      </div>
    </div>
  </section>

  <!-- <section class="section page-two">
    <div class="container">
      <div class="left">
        <h2>About CHINEASE LTD</h2>
        <p>
          CHINEASE LTD is an international education company registered in UK. We work with Chinese and British institutions and universities to provide teaching positions, internships and graduate schemes for English students and teachers to work abroad in China.
        </p>

        <p>
          We are different from the traditional headhunting company is that we not only provide a large number of high-quality working opportunities but also one-stop humanized services. We monitor from the candidate resume screening to the final entry process without any concern of candidates. In addition, our Chinese departments will be post-entry docking and care, to provide full range of services. Which is to let the candidates know and understand the Chinese culture and integrate into the local environment better.
        </p>
      </div>
      <div class="right">Our application service is totally Free for the candidate!!!</div>
    </div>
  </section> -->

  <section class="section page-7">
    <div class="container">
      <h2>What makes CHINEASE LTD stand out</h2>
      <div class="feedback">
        <div class="p">
          I have been teaching in China for nearly 4 months now and am thoroughly enjoying the experience. I am grateful to Tony and CHINEASE LTD for introducing me to the university and supporting me through the application process. Tony has always been on hand to answer any questions I have. When you are living and working abroad and don’t know the local language, it is reassuring to know that help is available and Tony has been approachable, reliable and honest.
          <div class="name">
            -- Michelle, UK
          </div>
        </div>

        <div class="p">
          <!-- To whom it may concern,<br/><br/> -->
          <!-- As program manager of the office of International Exchange and Operation, Huaihai Institute of Technology, China, it is my sincere and distinct pleasure to recommend CHINEASE LTD’s Foreign teacher recruitment service to other universities/schools. <br/><br/> -->
          They not only helped us recruit qualified foreign teachers but also assisted the foreign teachers in handling the relevant documents for Chinese Working Visa. Which is point that we are most grateful to CHINEASE LTD. In addition, they are also responsible for the follow-up of foreign teachers’ living and working in China. Based on the good foundation of cooperation before us, we can safely delegate this business to them. Therefore, I sincerely recommend CHINEASE to foreign teachers who want to go to China and many universities or schools in China.
          <!-- Thank you.  Sincerely,  Chen Qian <br/> -->
          <!-- office of International Exchange and Operation<br/> -->
          <!-- Huaihai Institute of Technology, China<br/> -->
          <div class="name">
            -- Huaihai Institute of Technology, China
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section page-three">
    <h2>Application Process</h2>
    <div class="container step-list">
      <a href="/site/applicationprocess#1">
        <div class="step-item">
          <span class="index">1</span>
          Talk to CHINEASE LTD and check your eligibility
        </div>
      </a>

      <a href="/site/applicationprocess#2">
        <div class="step-item">
          <span class="index">2</span>
          Take an initial video interview with us, then we will help you to match up a suitable position based on your preference
        </div>
      </a>

      <a href="/site/applicationprocess#3">
        <div class="step-item">
          <span class="index">3</span>
          Have a second interview with the school in China to receive your dream offer
        </div>
      </a>

      <a href="/site/applicationprocess#4">
        <div class="step-item">
          <span class="index">4</span>
          Apply for your Visa to China with the support of CHINEASE LTD
        </div>
      </a>

      <a href="/site/applicationprocess#5">
        <div class="step-item">
          <span class="index">5</span>
          Welcome to China! The new advaenture is waiting for you
        </div>
      </a>
    </div>
  </section>

  <section class="section page-five">
    <h2>Contact Us</h2>
    <h3>
      Please fill in the online form below to get in touch with us and we will respond to your enquiry as soon as possible.<br/>
      Alternatively, you can apply the position you are interested in now and one of our recruiters will be in touch to assist you with any questions you may have.<br/>
    </h3>
    <div class="container">
      <div id="map" class="map"></div>

      <form class="contact">
        <div class="form-group">
          <label>Name:</label>
          <input class="form-control message-name"/>
        </div>
        <div class="form-group">
          <label>Email:</label>
          <input class="form-control message-email" />
        </div>
        <div class="form-group">
          <label>Phone:</label>
          <input class="form-control message-phone"/>
        </div>
        <div class="form-group">
          <label>Address:</label>
          <input class="form-control message-address"/>
        </div>
        <div class="form-group">
          <label>Message:</label>
          <textarea class="form-control message-message" placeholder="Message"></textarea>
        </div>

        <span class="btn message-submit">Submit</span>
      </form>
    </div>
  </section>

  <footer class="section fp-auto-height">
    <div class="tip">Please follow & like us :)</div>
    <ul class="attention-list">
      <li class="attention-item">
        <a href="mailto:hello_chinease@outlook.com"></a>
      </li>
      <li class="attention-item">
        <a href="https://m.facebook.com/Chinease.Ltd/" target="_blank"></a>
      </li>
      <li class="attention-item">
        <a href="https://mobile.twitter.com/chinease_info" target="_blank"></a>
      </li>
      <li class="attention-item">
        <a href="https://www.instagram.com/hello_chinease/" target="_blank"></a>
      </li>
    </ul>
    <div class="license">©2018 - <a href="/">CHINEASE Ltd</a></div>
    <div class="legal">
      <a href="/site/terms">Terms & Conditions</a>
      <a href="/site/privacy">Privacy Policy</a>
    </div>
  </footer>
</div>

<i class="next-icon"></i>

<div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
      </div>
      <div class="modal-body">
        <form class="contact">
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" placeholder="Name" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" placeholder="Email" />
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" placeholder="Message"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIjN6O9bD4AfcYKxRRiVCeP_iz0oTQkcQ"></script>
