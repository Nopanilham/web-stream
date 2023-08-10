@extends('member.layouts.base')

@section('title', 'Watch Today');

@section('title-description', 'Our selected movies for your mood');

@section('content')

<!-- Subscription Stat -->
<div class="flex items-center gap-3">
    <img src="{{ asset('stream/assets/images/ic_subscription.svg') }}" alt="">
    <div class="flex flex-col gap-2">
        <div class="text-white text-[22px] font-semibold">
            {{ ucwords($user_premium->package->name) }} Package
        </div>
        <div class="flex items-center gap-[10px]">
            <div class="progress-bar w-[248px] h-[6px] bg-softpur rounded-full">
                <div class="progress bg-[#22C58B] w-[113px] h-full rounded-full"></div>
            </div>
            <div class="text-stream-gray text-sm">
                11 / 30 days
            </div>
        </div>
    </div>
</div>
<!-- /Subscription Stat -->

<!-- Benefits -->
<div class="flex flex-col gap-6 font-medium text-base text-white -mt-[10px] px-[18px]">
    <div class="flex gap-4 items-center">
        <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
        <span> {{ $user_premium->package->max_users }} Batasan Pengguna</span>
    </div>
    <div class="flex gap-4 items-center">
        <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
        <span>Kualitas Vidio Sangat Bagus Ultra HD 4K</span>
    </div>
    <div class="flex gap-4 items-center">
        <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
        <span>Tersedia Untuk Ditonton Di Ponsel, Tablet, Komputer, TV</span>
    </div>
    <div class="flex gap-4 items-center">
        <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
        <span>Fitur Donwload Offline</span>
    </div>
    <div class="flex gap-4 items-center">
        <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
        <span>Streaming Di Berbagai Perangkat</span>
    </div>
</div>
<!-- /Benefits -->

<!-- Action Button -->
<div class="flex flex-col gap-[14px] max-w-max">
    <form method="post" action="{{ route('member.transaction.store') }}">
        @csrf
        <input type="hidden" name="package_id" value="{{ $user_premium->package_id }}">
        <button type="submit"
        class="py-[13px] px-[58px] bg-[#5138ED] rounded-full text-center">
            <span class="text-white font-semibold text-base">
                Perbaruin Paket Berlangganan
            </span>
        </button>
    </form>
    <a href="{{ route('pricing') }}"
        class="py-[13px] px-[58px] outline outline-1 outline-stream-gray outline-offset-[-3px] rounded-full text-center">
        <span class="text-stream-gray font-normal text-base">
            Ganti Paket Berlangganan
        </span>
    </a>
</div>
<!-- /Action Button -->

<!-- Stop Subscribe -->
<div class="rounded-2xl bg-[#19152E] p-[30px] w-max">
    <div class="text-xl text-red-500 font-semibold">
        HATI-HATI
    </div>
    <p class="text-base text-white leading-[30px] max-w-[500px] mt-3 mb-[30px]">
    Jika Anda ingin berhenti berlangganan film kami, silakan lanjutkan dengan mengklik tombol di bawah ini. Pastikan Anda telah membaca syarat & ketentuan kami sebelumnya.
    </p>

    <form method="post" action="{{ route('member.user_premium.destroy', $user_premium->id) }}">
        @csrf
        @method('delete')
        <button
            type="submit"
            class="px-[19px] py-[13px] bg-[#FE4848] rounded-full text-center">
            <span class="text-white font-semibold text-base">
                Berhenti Berlangganan
            </span>
        </button>
    </form>
</div>
<!-- /Stop Subscribe -->
@endsection