@extends('site.layouts.app')

@section('content')
    <div class="section-title">
        <h2>Preço</h2>
        <p>Valores que cabem no seu bolso, escolha o plano que mais se adeque a sua rotina e seu orçamento mensal.</p>
    </div>

    <div class="row">

        @foreach ($plans as $plan)
            <div class="col-lg-4 col-md-6">
                <div class="box">
                    <h3>{{ $plan->name }}</h3>
                    <h4><sup>R$</sup>{{ number_format($plan->price, 2, ',', '.') }}<span> / mês</span></h4>
                    <ul>

                        @foreach($plan->details as $detail)
                            <li>{{ $detail->name }}</li>
                        @endforeach

                    </ul>
                    <div class="btn-wrap">
                        <a href="{{ route('plan.subscription', $plan->url) }}" class="btn-buy">Assinar</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
