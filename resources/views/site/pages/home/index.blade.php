@extends('site.layouts.app')

@section('content')
<div class="section-title">
        <h2>Pricing</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
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
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
