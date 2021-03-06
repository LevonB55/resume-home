@extends('layouts.main')

@section('title', 'Additional Information')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('css/Lcss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
    <main>
        <section class="dashboard_content">
            <form action="{{ route('additional-information') }}" method="POST">
                @csrf
                <div>
                    <div class="the_company websites">
                        <div class="second_block">
                            <h2>Additional Information</h2>
                        </div>

                        <div id="editor-container">
                          <textarea cols="80" rows="100" id="textarea-1" name="additional-info">{{ $additionalInfo->content ?? '' }}</textarea>
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

@section('extra-scripts')
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('js/editor-config.js')}}"></script>
@endsection