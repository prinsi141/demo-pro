  <nav id="sidebar">
      <div class="position-sticky">
          <div class="logo-wrappe">
              <h4>
                  Laravel
              </h4>
          </div>
          <ul class="nav flex-column">
              <li class="nav-item">
                  <a class="nav-link active" href="{{URL::to('home')}}">
                      Dashboard
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{URL::to('users')}}">
                      Users
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{URL::to('roles')}}">
                      Role
                  </a>
              </li>
          </ul>
      </div>
  </nav>