@extends('template')


@section('content')

    <!-- // DEVELOPPEUR DU SITE WEB //  -->
    <section class="container-page">
        
        <div class="paragraphe-text">
            <div class="header-page-container">
                <div class="header-title-container">
                    <h3 class="middle-title">
                        Merci au développeur pour la réalisation de notre site !
                    </h3>
                </div>
            </div>
        </div>

        <!-- // TABLE // -->
        <div class="table-container">
            <table class="table-credit">
                <thead class="thead">
                    <tr class="text">
                        <td>Nom</td>
                        <td>Portfolio</td>
                        <td>LinkedIn</td>
                    </tr>
                </thead>
                <tbody class="tbody text">
                    <tr>
                        <td><i class="ri-vip-crown-line lg icon-crown"></i>Ethan Delbos</td>
                        <td><a href="https://ethandelbos.com/"style="color:var(--blue-color);">Portfolio</a></td>
                        <td><a href="https://ethandelbos.com/"style="color:var(--blue-color);">LinkedIn</a></td>    
                    </tr>
                    <tr>
                        <td>Bettahir Audrey</td>
                        <td><a href="#"style="color:var(--blue-color);">Portfolio</a></td>
                        <td><a href="#"style="color:var(--blue-color);">LinkedIn</a></td>
                    </tr>
                    <tr>
                        <td>Petithuguenin Axel</td>
                        <td><a href="#"style="color:var(--blue-color);">Portfolio</a></td>
                        <td><a href="https://fr.linkedin.com/in/axel-petithuguenin-655b05238"style="color:var(--blue-color);">LinkedIn</a></td>
                    </tr>
                </tbody>
            </table>
        </div>             
    </section>

@stop
