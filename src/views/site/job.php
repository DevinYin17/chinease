<div class="job-wrapper job-container">
  <div class="container">
    <h2></h2>
    <div class="header-tip">
      <span class="text">We are right here looking forward to help the first step of your adventure to China!</span>

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
</div>
