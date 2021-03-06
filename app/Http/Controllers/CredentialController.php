<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResumeFormatting;
use App\Http\Requests\StoreResumeHeader;
use App\Models\Credential;
use App\Models\Experience;
use App\Models\ExtraCredential;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Session;
use Route;

class CredentialController extends Controller
{

    const TEMPLATE = 1;
    const RESUME_COMPLETE = 1;

    //Gets templates page
    public function getTemplates() {
        $templates = Template::all();
        return view('credentials.templates', compact('templates'));
    }

    public function chooseTemplate(Request $request) {
        $request->validate([
            'template' => 'sometimes|required|integer|min:1',
        ]);

        $template = $request->input('template');

        Credential::updateOrCreate(['user_id' => auth()->id()], [
            'user_id' => auth()->id(),
            'template_id' => $template ? $template : self::TEMPLATE
        ]);

        return redirect()->route('create-resume');
    }

    //Gets create-resume page
    public function createResume() {
        return view('credentials.create-resume');
    }

    //Gets resume header page
    public function header() {
        $credential = Auth::user()->credential;
        return view('credentials.header', compact('credential'));
    }

    //Stores header
    public function storeHeader(StoreResumeHeader $request) {

        Credential::updateOrCreate(['user_id' => Auth::id()], request([
           'first_name', 'last_name', 'address', 'city', 'state', 'zip', 'email', 'phone'
        ]));

        $experienceCount = auth()->user()->experiences->count();

        if ($experienceCount <= 0) {
            return redirect()->route('experience.create');
        } else {
            return redirect()->route('experience.index');
        }

    }

    //Gets skills page
    public function getSkills()
    {
        $skills = auth()->user()->credential->skills;
        return view('credentials.skills', compact('skills'));
    }

    public function storeSkills(Request $request)
    {
        $request->validate([
            'skills' => 'nullable|min:5|max:3000',
        ]);

        auth()->user()->credential()->update(request(['skills']));

        return redirect()->route('summary');
    }

    //Gets summary page
    public function getSummary() {
        $summary = auth()->user()->credential->summary;
        return view('credentials.summary', compact('summary'));
    }

    public function storeSummary(Request $request)
    {
        $request->validate([
            'summary' => 'nullable|min:5|max:3000',
        ]);

        auth()->user()->credential()->update(request(['summary']));

        return redirect()->route('add-section');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getResumeReview()
    {
        $templates = Template::all();
        $credential = auth()->user()->credential;
        $extraCredentials = ExtraCredential::getExtraCredentials();
        $fonts = $this->getFonts();
        auth()->user()->credential()->update(['resume_complete' => self::RESUME_COMPLETE]);
        Session::forget('add-sections');

        return view('credentials.resume-review', compact('credential','extraCredentials', 'templates', 'fonts'));
    }

    public function updateResumeReview(StoreResumeFormatting $request)
    {
        auth()->user()->credential()->update([
            'template_id' => $request->input('template_id'),
            'font_family' => $this->getFonts()[$request->input('font_family')],
            'font_size' => $request->input('font_size'),
            'heading_size' => $request->input('heading_size'),
            'section_spacing' => $request->input('section_spacing'),
            'par_spacing' => $request->input('par_spacing'),
            'line_spacing' => $request->input('line_spacing'),
            'tb_margin' => $request->input('tb_margin'),
            'side_margin' => $request->input('side_margin'),
            'par_indent' => $request->input('par_indent'),
            'font_weight' => $request->input('font_weight')
        ]);

        return back();
    }

}
