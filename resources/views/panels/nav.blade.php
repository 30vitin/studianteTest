 <div class="sidebar" data-color="purple" data-background-color="white">

      <div class="logo" style="background:#fff !important;">
         <img src="{{asset('images/bg-02.jpg')}}"  alt="Italian Trulli" class="simple-text logo-normal" height="90px" width="100%">

      </div>
      <div class="sidebar-wrapper" style="background:#fff !important;">
        <ul class="nav">
          <li class="nav-item  {{ (request()->is('register-student')) ? 'active' : '' }}">
            <a class="nav-link" href="/register-student">
              <i class="material-icons">assignment_ind</i>
              <p>Registrar Estudiante</p>
            </a>
          </li>
          <li class="nav-item  {{ (request()->is('consult-student')) ? 'active' : '' }} ">
            <a class="nav-link" href="/consult-student">
              <i class="material-icons">search</i>
              <p>Consultar Estudiante</p>
            </a>
          </li>
          <li class="nav-item   ">
            <a class="nav-link" href="/logout">
              <i class="material-icons">login</i>
              <p>Salir</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
  </div>