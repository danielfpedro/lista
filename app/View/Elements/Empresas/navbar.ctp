<div class="navbar navbar-static-top">
  <div class="navbar-inner">
    <div class="container-fluid">

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <!-- Everything you want hidden at 940px or less, place within here -->
      <div class="nav-collapse collapse">
        <!-- .nav, .navbar-search, .navbar-form, etc -->


        <form class="navbar-search pull-left">
          <input type="text" class="search-query" placeholder="Search">
        </form>


        <ul class="nav pull-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php echo $user_email; ?>
              &nbsp;<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Alterar senha</a></li>
                <li><a href="#">Configurações de conta</a></li>
              </ul>
            </li>
            <li>
              <?php echo $this->Html->link('<i class=\'icon-off\'></i>',
                array('controller' => 'empresas','action' => 'logout'),
                array('escape' => false));
                ?>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>