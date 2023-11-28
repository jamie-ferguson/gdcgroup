<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Affiliates by Distance') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("The list below are affiliates within :distance km of our Dublin office.", ['distance' => $distance]) }}
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <div class="grid gap-2 grid-cols-3">
            @foreach ($affiliatesWithinDistance as $affiliate)
                <div> {{$affiliate->affiliate_id}} </div>
                <div> {{$affiliate->name}} </div>
                <div> {{$affiliate->distance}} </div>
            @endforeach
        </div>
    </div>
</section>
