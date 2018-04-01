<div class="jobvacancy-wrapper">
  <div class="job-banner">
    <div class="search-container">
      <div class="dropdown cus-input">
        Type
        <ul class="dropdown-list">
          <li class="dropdown-item">social recruitment</li>
          <li class="dropdown-item">graduate scheme</li>
          <li class="dropdown-item">internship</li>
        </ul>
      </div>

      <input placeholder="category" class="cus-input">
      <input placeholder="city" class="cus-input">
      <span class="cus-btn">search</span>
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
    <a class="type-item" href="#">current vacancy</a>
    <a class="type-item" href="#">raduate scheme</a>
    <a class="type-item" href="#">internship</a>
  </ul>

  <div class="job-container">
    <div class="container">
      <h2>Current Vacancy</h2>
      <div class="header-tip">
        <span class="text">We are right here looking forward to help the first step of your adventure to China!</span>

        <div class="btn-right">
          <input placeholder="category" class="cus-input">
          <input placeholder="city" class="cus-input">
          <span class="cus-btn">search</span>
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


      </ul>
    </div>
  </div>
</div>
