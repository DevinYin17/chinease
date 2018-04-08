<div class="jobvacancy-wrapper">
  <div class="job-banner">
    <div class="search-container">
      <div class="dropdown cus-input">
        Type
        <ul class="dropdown-list">
          <a href="/site/job?key=category&value=Current Vacancy">
            <li class="dropdown-item">Current Vacancy</li>
          </a>
          <a href="/site/job?key=category&value=Graduate Scheme">
            <li class="dropdown-item">Graduate Scheme</li>
          </a>
          <a href="/site/job?key=category&value=Internship">
            <li class="dropdown-item">Internship</li>
          </a>
        </ul>
      </div>

      <input placeholder="category" class="cus-input job-category">
      <input placeholder="city" class="cus-input job-location">
      <span class="cus-btn job-search">search</span>
    </div>

    <ul class="count-list container">
      <li class="count-item">
        Jobs
        <span class="number">198</span>
      </li>

      <li class="count-item">
        Beijing
        <span class="number">65</span>
      </li>

      <li class="count-item">
        Shanghai
        <span class="number">90</span>
      </li>

      <li class="count-item">
        Jiangsu
        <span class="number">78</span>
      </li>

      <li class="count-item">
        others
        <span class="number">198</span>
      </li>
    </ul>
  </div>

  <ul class="type-list container">
    <a class="type-item" href="/site/job?key=category&value=Current Vacancy">Current Vacancy</a>
    <a class="type-item" href="/site/job?key=category&value=Graduate Scheme">Graduate Scheme</a>
    <a class="type-item" href="/site/job?key=category&value=Internship">Internship</a>
  </ul>

  <div class="job-container">
    <div class="container">
      <h2>Current Vacancy</h2>
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
</div>
