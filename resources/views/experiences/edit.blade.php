@extends('layouts.main')

@section('title', 'Edit Experience')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('css/Lcss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/jquery-ui.min.css') }}">
@endsection

@section('content')
    <main>
        <section class="dashboard_content">
            <form action="{{ route('experience.update', $experience->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="check">
                    <div class="step-container">

                        <div class="d-inline-block">
                            <div class="step active1" data-step="1">
                                <span class="fas fa-check"></span>
                            </div>
                            <div class="step-separator active1" data-step="1"></div>
                            <div class="steps_number active2">HEADER</div>
                        </div>
                        <div class="d-inline-block">
                            <div class="step active1" data-step="2">
                                <span class="fas fa-check"></span>
                            </div>
                            <div class="step-separator" data-step="2"></div>
                            <div class="steps_number active2">EXPERIENCE</div>
                        </div>
                        <div class="d-inline-block">
                            <div class="step" data-step="3">
                                3
                            </div>
                            <div class="step-separator" data-step="3"></div>
                            <div class="steps_number">EDUCATION</div>
                        </div>
                        <div class="d-inline-block">
                            <div class="step" data-step="4">
                                4
                            </div>
                            <div class="step-separator" data-step="4"></div>
                            <div class="steps_number">SKILLS</div>
                        </div>
                        <div class="d-inline-block">
                            <div class="step" data-step="5">
                                5
                            </div>
                            <div class="step-separator" data-step="5"></div>
                            <div class="steps_number">SUMMARY</div>
                        </div>

                        <div class="d-inline-block">
                            <div class="step" data-step="6">
                                6
                            </div>

                            <div class="steps_number">FINALIZE</div>
                        </div>


                        <div class="next-step"></div>
                    </div>
                </div>

                <div class="clon">
                    <div class="start_header">
                        <div class="header_inputs">
                            <h2>Let's work on your experience</h2>
                            <p>Start with your most recent job first. You can also add volunteer work, internships, or extracurricular
                                activities.</p>

                            <div class="job_area">
                                <div class="form_header">
                                    <div class="name">
                                        <div class="first_name">
                                            <label>Job Title</label>
                                            <input type="text" value="{{ $experience->title }}" name="title">
                                            @error('title')
                                                <span class="text-danger mb-2"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="first_name">
                                            <label>Employer</label>
                                            <input type="text" value="{{ $experience->employer }}" name="employer">
                                            @error('employer')
                                                <span class="text-danger mb-2"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="name">
                                        <div class="first_name">
                                            <label>City</label>
                                            <input type="text" value="{{ $experience->city }}" name="city">
                                            @error('city')
                                                <span class="text-danger mb-2"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="first_name">
                                            <label>State</label>
                                            <input type="text" value="{{ $experience->state }}" name="state">
                                            @error('state')
                                                <span class="text-danger mb-2"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="time_input">
                                        <div class="data_input">
                                            <label>Start Date</label>
                                            <input type="date" id="start" value="{{ $experience->start_date }}" name="start_date">
                                            @error('start_date')
                                                <span class="text-danger mb-2"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="data_input">
                                            <label>End Date</label>
                                            <input type="date" value="{{ $experience->end_date }}" name="end_date" class="exp-end-date end-date" {{ !$experience->end_date ? 'disabled' : '' }}>
                                            @error('end_date')
                                                <span class="text-danger mb-2"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <label  for="current" class="containera Work_here">I currently work here
                                    <input type="checkbox" class="exp-check" id="current" name="current" {{ !$experience->end_date ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="tips">

                            <div class="dropdown show">
                                <div class="customer btn dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="{{ asset('assets/images/customer-service.png') }}">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right show">
                                    <h4>TIPS</h4>
                                    <ul>
                                        <li>
                                            <p>Include up to 10 years of recent work experience,
                                                beginning with your current or most recent employer.</p>
                                        </li>
                                        <li>
                                            <p>Use bullets to list your major accomplishments and experience
                                                so employers can easily scan your resume.</p>
                                        </li>
                                        <li>
                                            <p>If you have relevant work experience from more than 10 years ago,
                                                we recommend adding a separate section called Previous Work Experience.</p>
                                        </li>
                                    </ul>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="preview-wrapper">
                        {{--                    @include('partials._preview-resume')--}}
                        @include('partials._resume-modal')
                    </div>
                    {{--                <div class="preview">--}}
                    {{--                    <p data-toggle="modal" data-target="#exampleModalCenter">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">--}}
                    {{--                            <defs><style>.a{fill:#18358a;}</style></defs><g transform="translate(10.554 9.374)">--}}
                    {{--                                <path class="a" d="M278.4,247.557a3.532,3.532,0,0,0-.376-4.549,3.641,3.641,0,0,0-5.009,0,3.536,3.536,0,0,0,4.549,5.384l3.024,2.953.835-.835Z" transform="translate(-271.979 -242.01)"/>--}}
                    {{--                            </g><g transform="translate(10.603 0.346)"><path class="a" d="M272,8.789v4.416h4.377Z" transform="translate(-272 -8.789)"/>--}}
                    {{--                            </g><path class="a" d="M14.108,17.618A4.637,4.637,0,0,1,10.8,16.243a4.649,4.649,0,0,1,4.476-7.8V5.9H9.431V0H0V20H15.277V17.452A4.661,4.661,0,0,1,14.108,17.618ZM2.338,7.07H10.6V8.242H2.338Zm5.924,8.2H2.338V14.1H8.262Zm0-2.344H2.338V11.758H8.262Zm0-2.344H2.338V9.414H8.262Z"/></svg>Preview Resume</p>--}}
                    {{--                </div>--}}

                    <div class="the_company">
                        <h3>Tell us what you did and how you helped the company</h3>
                        <div class="search_job">
                            <div class="box1">
                                <div class="job">
                                    <div class="dropdown">
                                        <input type="search" placeholder="Search by job title, industry or keyword" class="prof-search">
                                        <span class="fas fa-search"></span>
                                    </div>
                                </div>
                                <div class="add_text">
                                    <div class="text_button">
                                        <p>Completed all company insurance renewals including property, Workers' Compensation, general liability, cargo, aviation and K & R documents.</p>
                                        <button>Add</button>
                                    </div>
                                    <div class="text_button">
                                        <p>Led [type] team in delivery of [type] project requiring close cooperation among members to share information and develop solutions to meet broad array of deliverables.</p>
                                        <button>Add</button>
                                    </div>
                                    <div class="text_button">
                                        <p>Prepared departmental contracts for attorney approval.</p>
                                        <button>Add</button>
                                    </div>
                                    <div class="text_button">
                                        <p>Installed, tested and serviced alarm systems, ensuring that they functioned correctly.</p>
                                        <button>Add</button>
                                    </div>
                                    <div class="text_button">
                                        <p>Completed all company insurance renewals including property, Workers' Compensation, general liability, cargo, aviation and K & R documents.</p>
                                        <button>Add</button>
                                    </div>

                                </div>


                            </div>
                            <div class="box2">
                                <div id="editor-container">
                                    <textarea cols="53" rows="16" id="textarea-1" name="description">
                                        {{ $experience->description }}
                                    </textarea>
                                    @error('description')
                                        <span class="text-danger mb-2"> {{ $message }} </span>
                                    @enderror
                                    <span class="text-danger mb-2 error" id="experience1_description"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="back_continue experience_page">
                    <a href="{{ route('experience.index') }}" class="back_left">
                        <p>Cancel</p>
                    </a>
                    <button type="submit" value="Continue" class="continue_right">
                        Continue<span class="fas fa-long-arrow-alt-right"></span>
                    </button>
                </div>
            </form>
        </section>


    </main>
@endsection

@section('extra-scripts')
    <script src="{{ asset('assets/libs/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('js/editor-config.js')}}"></script>
    <script src="{{asset('js/experience.js')}}"></script>
@endsection