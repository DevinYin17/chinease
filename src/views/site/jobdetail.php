<div class="jobdetail-wrapper">

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
      <div class="info"><?= $this->params['model']['responsibility'] ?></div>

      <a class="btn" href="/site/apply">Apply now!</a>

    </div>

    <div class="right">
      <div class="label">Similar jobs</div>
      <div class="job-item line">
        <div class="info title"><?= $this->params['model']['title'] ?></div>
        <div class="info"><?= $this->params['model']['base_title'] ?></div>
      </div>
      <div class="job-item line">
        <div class="info title"><?= $this->params['model']['title'] ?></div>
        <div class="info"><?= $this->params['model']['base_title'] ?></div>
      </div>
      <div class="job-item line">
        <div class="info title"><?= $this->params['model']['title'] ?></div>
        <div class="info"><?= $this->params['model']['base_title'] ?></div>
      </div>
      <div class="job-item line">
        <div class="info title"><?= $this->params['model']['title'] ?></div>
        <div class="info"><?= $this->params['model']['base_title'] ?></div>
      </div>
      <div class="job-item line">
        <div class="info title"><?= $this->params['model']['title'] ?></div>
        <div class="info"><?= $this->params['model']['base_title'] ?></div>
      </div>

      <div class="label">categories</div>
      <div class="info center">Social recruitment</div>
      <div class="info center">Intern recruitment</div>
      <div class="info center line">Internship</div>

      <div class="label">location</div>
      <div class="info center title">Beijing</div>
      <div class="info center title">Shanghai</div>
      <div class="info center title">Guangzhou</div>
      <div class="info center title line">other</div>

      <div class="label">contact ways</div>
      <div class="info center">
        Email:<a>hello@chinease.co.uk</a>
      </div>
    </div>
  </div>
</div>
