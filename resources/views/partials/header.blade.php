<header>
  <nav class="navbar navbar-expand-md bd-navbar">
    <div class="container">
      <a href="{{ url('/') }}" title="Redistribution" class="navbar-brand text-center">
        Redistribution
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav bd-navbar-nav flex-row">
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('list') }}">Lista</a>
          </li>    
           <li class="nav-item">
            <a class="nav-link active" href="{{ url('article') }}">Enunt</a>
          </li>    
        </ul>
      </div>
    </div>
  </nav>
</header>