<div class="jobdetail-wrapper">

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

  <div class="content container">
    <div class="left">
      <div class="title"><?= $this->params['model']['title'] ?></div>
      <div class="info line"><?= $this->params['model']['date'] ?> <?= $this->params['model']['author'] ?></div>
      <div class="label"></div>

      <div class="basic-list">
        <div class="basic-item xl">
          <div class="basic-title">Job title:</div>
          <div class="basic-info"><?= $this->params['model']['base_title'] ?></div>
        </div>

        <div class="basic-item l">
          <div class="basic-title">Work type:</div>
          <div class="basic-info"><?= $this->params['model']['base_type'] ?></div>
        </div>

        <div class="basic-item xl">
          <div class="basic-title">Age group:</div>
          <div class="basic-info"><?= $this->params['model']['base_group'] ?></div>
        </div>

        <div class="basic-item l">
          <div class="basic-title">Location:</div>
          <div class="basic-info"><?= $this->params['model']['base_location'] ?></div>
        </div>
      </div>

      <div class="label">Benefits:</div>
      <div class="info line"><?= $this->params['model']['benefits'] ?></div>

      <div class="label">Other benefits information:</div>
      <div class="info"><?= $this->params['model']['information'] ?></div>
      <div class="info mark line">
        Total salary: <?= $this->params['model']['salary'] ?>
      </div>

      <div class="label">Work requirements:</div>
      <div class="info line"><?= $this->params['model']['requirement'] ?></div>

      <div class="label">Responsibility:</div>
      <div class="info line"><?= $this->params['model']['responsibility'] ?></div>

      <div class="label">Detail:</div>
      <div class="info detail-images">
        <?php if ($this->params['model']['image_1']) {?>
          <div class="detail-item" style="background-image: url(<?= $this->params['model']['image_1'] ?>)"></div>
        <?php } ?>
        <?php if ($this->params['model']['image_2']) {?>
          <div class="detail-item" style="background-image: url(<?= $this->params['model']['image_2'] ?>)"></div>
        <?php } ?>
        <?php if ($this->params['model']['image_3']) {?>
          <div class="detail-item" style="background-image: url(<?= $this->params['model']['image_3'] ?>)"></div>
        <?php } ?>
        <?php if ($this->params['model']['image_4']) {?>
          <div class="detail-item" style="background-image: url(<?= $this->params['model']['image_4'] ?>)"></div>
        <?php } ?>
        <?php if ($this->params['model']['image_5']) {?>
          <div class="detail-item" style="background-image: url(<?= $this->params['model']['image_5'] ?>)"></div>
        <?php } ?>
        <?php if ($this->params['model']['image_6']) {?>
          <div class="detail-item" style="background-image: url(<?= $this->params['model']['image_6'] ?>)"></div>
        <?php } ?>
      </div>

      <a class="btn to-apply" href="javascript:void(0);" >Apply now!</a>

    </div>

    <div class="right">
      <div class="label">Similar jobs</div>
      <?php foreach ($this->params['jobs'] as $job) {
        ?>
        <a href="/site/jobdetail?id=<?= $job['id']?>">
          <div class="job-item line">
            <div class="info title"><?= $job['title'] ?></div>
            <div class="info"><?= $job['base_title'] ?></div>
          </div>
        </a>

          <?php
      } ?>

      <div class="label">categories</div>
      <a href="/site/job?key=category&value=Current Vacancy"><div class="info center">Current Vacancy</div></a>
      <a href="/site/job?key=category&value=Graduate Scheme"><div class="info center">Graduate Scheme</div></a>
      <a href="/site/job?key=category&value=Internship"><div class="info center line">Internship</div></a>

      <div class="label">location</div>
      <a href="/site/job?key=base_location&value=Beijing"><div class="info center title">Beijing</div></a>
      <a href="/site/job?key=base_location&value=Shanghai"><div class="info center title">Shanghai</div></a>
      <a href="/site/job?key=base_location&value=Jiangsu"><div class="info center title">Jiangsu</div></a>
      <a href="/site/job?key=base_location&value="><div class="info center title line">other</div></a>

      <div class="label">contact ways</div>
      <div class="info center">
        Email:<a href="mailto:hello_chinease@outlook.com">hello_chinease@outlook.com</a>
      </div>
    </div>
  </div>
</div>
