@extends('layouts.main')

@section('title', 'Websites, portfolios, profiles')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('css/Lcss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
    <main>
        <section class="dashboard_content">
            <form action="{{ route('profiles') }}" method="POST">
                @csrf
                <div class="clon">
                    <div class="the_company websites">
                        <div class="second_block">
                            <h2>Websites, Portfolios, Profiles</h2>
                            <h6>List links to your website, portfolio, blog, LinkedIn, Skype & more.</h6>
                        </div>
                        <div class="url">
                            <div class="url_top">
                                <input type="text" placeholder="Personal link" name="profiles[]" value="{{ isset($profiles[0]) ? strip_tags($profiles[0]) : '' }}">
                                <input type="text" placeholder="Personal link" name="profiles[]" value="{{ isset($profiles[1]) ? strip_tags($profiles[1]) : '' }}">
                            </div>
                            <div class="url_bottom">
                                <input type="text" placeholder="Personal link" name="profiles[]" value="{{ isset($profiles[2]) ? strip_tags($profiles[2]) : '' }}">
                                <input type="text" placeholder="Personal link" name="profiles[]" value="{{ isset($profiles[3]) ? strip_tags($profiles[3]) : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="back_continue experience_page">

                    @if(auth()->user()->credential->resume_complete)
                        <a href="{{ route('resume-review') }}" class="back_left">
                            <p> Cancel</p>
                        </a>
                    @else
                        <a href="{{ route($previousSection) }}" class="back_left">
                            <p><span class="fas fa-long-arrow-alt-left"></span> Back</p>
                        </a>
                    @endif

                    <button type="submit" class="btn continue_right text-white">
                        Continue <span class="fas fa-long-arrow-alt-right"></span>
                    </button
                </div>
            </form>
        </section>

    </main>
@endsection
