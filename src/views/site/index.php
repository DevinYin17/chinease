<div id="fullpage" class="index-wrapper">
  <section class="section page-one-2 text-center">
    <h2>CHINEASE Limited Company</h2>
    <h3>Ease your way teaching in China</h3>
  </section>

  <section class="section page-one">
    <h2>Are you an English language teacher?</h2>
    <h3>Then why not come to CHINA?</h3>
    <div class="type-list container">
      <a class="type-item" href="/site/job?key=category&value=Current Vacancy">Current Vacancy</a>
      <a class="type-item" href="/site/job?key=category&value=Graduate Scheme">Graduate Scheme</a>
      <a class="type-item" href="/site/job?key=category&value=Internship">Internship</a>
    </div>
  </section>

  <section class="section page-two">
    <div class="container">
      <div class="left">
        <h2>Why Choose CHINEASE?</h2>
        <p>
          Chinease LTD. is an international recruitment specialist registered in the UK.<br/>
          We work with top Chinese & British employers and Universities to provide Teaching Jobs, Work Opportunities, Internships and Graduate Programmes for UK graduates and teachers to work abroad in China.
        </p>

        <p>
          Our team have education background in the UK and understand the local culture for 5 years, so we have extensive knowledge of the UK education system and Graduate Scheme. We have a very strong connection with Chinese universities and institutions. If you have any question, just feel free to contact us.<br/>
          We are right here looking forward to help the first step of your adventure to China!
        </p>
      </div>
      <div class="right">Our application service is totally Free for the candidate!!!</div>
    </div>
  </section>

  <section class="section page-three">
    <h2>Application steps</h2>
    <div class="container step-list">
      <div class="step-item">
        <span class="index">1</span>
        Talk to Us and Check Your Eligibility
      </div>
      <div class="step-item">
        <span class="index">2</span>
        Apply your favorite Position then take the initial video interview
      </div>
      <div class="step-item">
        <span class="index">3</span>
        Receiving an Offer after Passing the Interview
      </div>
      <div class="step-item">
        <span class="index">4</span>
        Visa Check and documents preparation
      </div>
      <div class="step-item">
        <span class="index">5</span>
        Welcome to China! Induction Week
      </div>
    </div>
  </section>

  <section class="section page-four">
    <h2>The cooperation unit</h2>

    <div class="container">
      <div class="job-container">
        <ul class="job-list">

          <?php foreach ($this->params['model'] as $job) {
            ?>
            <a class="job-item" href="/site/jobdetail?id=<?= $job['id']?>">
              <i class="logo job1" style="background-image: url(<?= $job['pic']?>)"></i>
              <div class="desc">
                <label class="name"><?= $job['title']?></label>
                <span class="info"><?= $job['base_type']?></span>
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

      <div class="swiper-container schools">
        <div class="swiper-wrapper">
          <div class="swiper-slide kuangye"></div>
          <div class="swiper-slide huaihai"></div>
          <div class="swiper-slide qiqi"></div>
          <div class="swiper-slide wuyue"></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>

  <section class="section page-four-2">
    <div class="container">
      <div class="video">
        <!-- <video controls>
          <source src="/build/images/index/movie.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video> -->
        <iframe width="854" height="480" src="https://www.youtube.com/embed/W0SVb327Qqc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>

      <div class="china">
        <a href="https://www.youtube.com/watch?v=wAEzpwvrveg" target="_blank">
          <div class="item item-1">
            <label class="title">Chiese Food</label>
            <label class="type">Product/Service Categories</label>
          </div>
        </a>

        <a href="https://www.youtube.com/watch?v=wAEzpwvrveg" target="_blank">
          <div class="item item-2">
            <label class="title">Online shopping</label>
            <label class="type">Product/Service Categories</label>
          </div>
        </a>

        <a href="https://www.youtube.com/watch?v=wAEzpwvrveg" target="_blank">
          <div class="item item-3">
            <label class="title">Reading time</label>
            <label class="type">Product/Service Categories</label>
          </div>
        </a>
      </div>
    </div>
  </section>

  <section class="section page-five">
    <h2>Contact Us</h2>
    <h3>
      Get in touch to learn more about how our career experts can help you. Whatever it is you need, we’re here for you. Please feel</br>
      free to contact info@chinease.co.uk<br/>
      OR<br/>
      Just fill in the form below. <br/>
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
</div>

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
