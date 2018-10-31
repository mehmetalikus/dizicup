
  <div class="container pad0 mar0">
  <p id="quotes"><span class="series-quotes"><?= $quote["Quote"] ?></span> <br> <?= $quote["QuoteFrom"] ?> </p>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
          <span class="sr-only">Aç</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="navbar-collapse collapse" id="navbar-collapsible">

        <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
          <li><a href="<?= site_url(); ?>">Anasayfa</a></li>
          <li><a href="<?= site_url("Iletisim"); ?>">İletişim</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm" style="margin-right: 15px;">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Arkaplan <span class="caret"></span></a>
              <ul id="bgPicker" class="dropdown-menu">
                  
              </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
