  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <?php if (!empty($_SESSION['usuario']['imagem'])) : ?>
                      <img src="<?= 'arquivos/perfil/' . $_SESSION['usuario']['imagem'] ?>" class="img-circle elevation-2" alt="User Image">
                  <?php else : ?>
                      <img src="arquivos/alunos/padrao/padrao.png" class="img-circle elevation-2" alt="User Image">
                  <?php endif; ?>
              </div>
              <div class="info">
                  <a href="home.php" class="d-block"><?= $_SESSION['usuario']['nome'] ?></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Pesquisar" aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                      <a href="home.php" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="perfil.php" class="nav-link ">
                          <i class="nav-icon fas fa-user-circle"></i>
                          <p>
                              Perfil
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="listaGrupos.php" class="nav-link ">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Turmas
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="listaAlunos.php" class="nav-link ">
                          <i class="nav-icon fas fa-user-friends"></i>
                          <p>
                              Alunos
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="atividades.php" class="nav-link ">
                          <i class="nav-icon fas fa-clipboard-list"></i>
                          <p>
                              Atividades
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="listaExercicios.php" class="nav-link ">
                          <i class="nav-icon fas fa-dumbbell"></i>
                          <p>
                              Exercícios
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="configs.php" class="nav-link ">
                          <i class="nav-icon fas fa-cogs"></i>
                          <p>
                              Configurações
                          </p>
                      </a>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>