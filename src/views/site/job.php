<div class="job-wrapper job-container">
  <div class="container">
    <h2></h2>
    <div class="header-tip">
      <span class="text" style="font-size:18px;">
        If you are fluent English speaker and hold bachelor degree or above</br>
        If you want to travel around China when you are off work</br>
        If you want to join an experienced foreign teacher group</br>
        <b style="display:block;padding:20px 0;font-size:24px;">Just apply our graduate schemes</b>
        <div style="padding-right:200px;text-align: justify;">Our company gives the bridge from the campus to the job position for the majority of graduates. We cooperate with several big teaching companies which provide graduate schemes for graduates who want to start their teaching careers in China. And all of successful candidates will be offered the paid TEFL courses in China which is the initial certificate in your career. In addition, a good promotion system not only ensures the graduates can prove themselves in a short period but also guarantees the good salary for you.</div>
      </span>

      <div class="btn-right">
        <input placeholder="category" class="cus-input job-category">
        <input placeholder="city" class="cus-input job-location">
        <span class="cus-btn job-search">search</span>
      </div>
    </div>

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
