@extends('front.layout')
@section('meta-keywords', "$seo->quot_meta_key")
@section('meta-description', "$seo->quot_meta_desc")
@section('content')

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/'.$setting->breadcrumb_image) }}')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title">{{ __('DIREITOS PRIVACIDADE') }}</h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
							<li class="active" aria-current="page">{{ __('LGPD') }}</li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->
    
<!-- Quot Area Start -->
<section class="quote-page pt-120 pb-120"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('front.quote_submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
					<h3 align="center">Exercendo seu direito de privacidade:</h3>
Nos termos do art. 18 da LGPD, aqui você pode requerer informações e correções de seus dados, conforme nossa <a href="https://sistemar.com.br/wp-content/uploads/2021/08/Politica-de-Privacidade-e-Protecao-de-Dados-v.2.pdf" target="_blank" rel="noopener">Política de Privacidade</a>.
<h4 align="center" >Preencha o formulário:</h4>
					<br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="{{ __('Nome completo') }} *" name="name" value="{{ old('name') }}">
                                @if ($errors->has('Nome'))
                                    <p class="text-danger"> {{ $errors->first('Nome') }} </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="email"  placeholder="{{ __('Email') }} *" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <p class="text-danger"> {{ $errors->first('E-mail') }} </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20"> 
                                <input type="text"  placeholder="{{ __('Telefone') }} *" name="phone" value="{{ old('phone') }}">
                            </div> <!-- input box -->
                            @if ($errors->has('phone'))
                                <p class="text-danger"> {{ $errors->first('Telefone') }} </p>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="{{ __('Empresa') }}" name="country" value="{{ old('country') }}">
                                @if ($errors->has('country'))
                                <p class="text-danger"> {{ $errors->first('Pais') }} </p>
                            @endif
                            </div> <!-- input box -->
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="{{ __('Nosso Cliente?') }}" name="budget" value="{{ old('budget') }}">
                            </div> <!-- input box -->
                            @if ($errors->has('budget'))
                                <p class="text-danger"> {{ $errors->first('Orçamento') }} </p>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="{{ __('Skype Id') }}" name="skypenumber" value="{{ old('skypenumber') }}">
                                @if ($errors->has('skypenumber'))
                                <p class="text-danger"> {{ $errors->first('Número Skype') }} </p>
                            @endif
                            </div> <!-- input box -->
                        </div>
                      
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="{{ __('Assunto') }} *" name="subject" value="{{ old('subject') }}">
                                @if ($errors->has('subject'))
                                <p class="text-danger"> {{ $errors->first('subject') }} </p>
                            @endif
                            </div> <!-- input box -->
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box file mb-20">
                                <label for="budget">{{ __('Caso desejar poderá enviar algum arquivo...') }}</label>
                                <input type="file"  id="budget" name="file">
                            </div> <!-- input box -->
                            @if ($errors->has('file'))
                                <p class="text-danger"> {{ $errors->first('Arquivos') }} </p>
                            @endif
                        </div>
                       
                        <div class="col-lg-12">
                            <div class="input-box text-center mb-20">
                                <textarea name="description"  id="#" cols="30" rows="10" placeholder="{{ __('Escreva aqui suas dúvidas,reclamações,elogios.') }} *">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                <p class="text-danger"> {{ $errors->first('Descrição') }} </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @if ($visibility->is_recaptcha == 1)
                            <div class="row mb-4">
                              <div class="col-lg-12">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                  @php
                                      $errmsg = $errors->first('g-recaptcha-response');
                                  @endphp
                                  <p class="text-danger mb-0">{{__("$errmsg")}}</p>
                                @endif
                              </div>
                            </div>
                          @endif
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box mb-20">
                            <button class="main-btn wow fadeInUp mt-20" data-wow-duration="1s" data-wow-delay=".3s" type="submit">{{ __('Enviar') }}</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Quot Area End -->

@endsection
