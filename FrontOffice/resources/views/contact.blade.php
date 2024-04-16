@extends('template')


@section('content')

<!-- // ADHERENT PAGE // -->
<section class="container-page">

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

    <div class="container-contact-page">
        <!-- // FORMULAIRE ADHERENT // -->
        <form action="{{ route('adherer-store') }}" method="post" class="form-contact">
        @csrf
            <div class="fomular-container">
                
                <!-- // TITLE -->
                <h3 class="middle-title" style="text-align: center;">
                    Nous contactez
                </h3>

                <!-- // LABEL NOM  // -->
                <div class="form-group">
                    <label for="nom" class="text label-dashboard">Nom</label>
                    <input type="text" class="input-box text input-box-contact" name="nom" id="nom" value="{{ old('nom') }}"/>
                    @error('nom')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- // LABEL PRENOM  // -->
                <div class="form-group">
                    <label for="prenom" class="text label-dashboard">Prénom</label>
                    <input type="text" class="input-box text input-box-contact" name="prenom" id="prenom" value="{{ old('prenom') }}"/>
                    @error('prenom')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- // LABEL EMAIL  // -->
                <div class="form-group">
                    <label for="email" class="text label-dashboard">E-mail</label>
                    <input type="email" class="input-box text input-box-contact" name="email" id="email" value="{{ old('email') }}"/>
                    @error('email')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- // LABEL CONTENUE  // -->
                <div class="form-group">
                    <label for="message" class="text label-dashboard">Votre message</label>
                    <textarea type="message" class="input-box text input-box-contact message-contact-container" name="message" id="message" value="{{ old('message') }}"></textarea>
                    @error('message')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- // BOUTON DE SOUMISSION DU FORMULAIRE // -->
                <div style="margin: 50px 0 25px 0;" class="wrap">
                    <button type="submit" class="btn green-btn text">
                        Envoyer le mail
                        <i class="ri-send-plane-2-fill icone"></i>
                    </button>
                </div>
            </div>

            <!-- // IMAGE // -->
            <div class="image-contact">
                <img src="./assets/img/logo/e-mail.png" alt="e-mail image" class="email-img">
                <div class="circle-contact c1"></div>
                <div class="circle-contact c2"></div> 
            </div>
            
        </form>

    </div>
</section>

@stop
