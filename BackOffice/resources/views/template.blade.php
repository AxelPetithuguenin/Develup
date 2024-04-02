<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ENGAGEMENT LEUCEMIE">  

    <title>Dashboard-Engagement-Leucemie</title>

    <!-- // LINK CSS // -->
    <link rel="stylesheet" href="{{ asset('BackOffice/public/assets/css/style.css') }}">
    <!-- CDN REMIXICON // -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" integrity="sha512-HXXR0l2yMwHDrDyxJbrMD9eLvPe3z3qL3PPeozNTsiHJEENxx8DH2CxmV05iwG0dwoz5n4gQZQyYLUNt1Wdgfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- // FAVICON  // -->
    <link rel="shortcut icon" href="{{ asset('BackOffice/public/assets/image/logo/logo.png') }}"/>

</head>
<body>
    
    <!-- // DASHBOARD // -->
    <section class="dashboard">
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('BackOffice/public/assets/image/logo/dark-logo.png') }}" alt="logo"/>
            </div>
            <div class="sidebar-link-container">
                <ul>
                    <li>
                        <a href="#" class="text sidebar-link"><i class="ri-calendar-fill"></i>
                            <p class="sidebar-text">Actualite</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text sidebar-link">
                            <i class="ri-chat-3-fill"></i>
                            <p class="sidebar-text">Témoignages</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text sidebar-link">
                            <i class="ri-hospital-fill"></i>
                            <p class="sidebar-text">Actions</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text sidebar-link">
                            <i class="ri-user-2-fill"></i>
                            <p class="sidebar-text">Bureau</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('partenaires.index')}}" class="text sidebar-link">
                            <i class="ri-shake-hands-fill"></i>
                            <p class="sidebar-text">Partenaires</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dashboard-container">
            <div class="dashboard-header">
                <div class="menu-hamburger-dashboard">
                    <span class="bar-menu-dashboard"></span>
                    <span class="bar-menu-dashboard"></span>
                    <span class="bar-menu-dashboard"></span>
                </div>
                <a href="#" class="btn btn-link text">Se déconnecter</a>
            </div>
            <div class="dashboard-content">
                <div class="dashboard-content-header">

                        <!-- // MESSAGE SUCCES // -->
                        @if(session('success'))
                            <div class="message-succes-dashboard">
                                <div class="message-succes-container">
                                    <div class="text">
                                        <i class="ri-bard-line lg"></i>
                                        {{ session('success') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                    <h1 class="middle-text dashboard-text">DASHBOARD</h1>
                    <div class="gray-line"></div>
                    <!-- // CONTAINER PAGE // -->
                    <div class="main-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>

  
    <!-- // SCRIPT // -->
    <script>
        
        const menuHamburger = document.querySelector('.menu-hamburger-dashboard');
        const sidebar = document.querySelector('.sidebar');
    
       
        menuHamburger.addEventListener('click', () => {
          
            sidebar.classList.toggle('sidebar-active');
        });
    </script>

</body>
</html>