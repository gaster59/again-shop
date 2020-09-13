<?php

namespace App\Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    private $__newsletter;

    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @method index
     * @param Request $request
     * @return json
     */
    public function index(Request $request)
    {
        $newsLetters = $this->newsletter->getNewsletters();
        return response()->json([
            'status'      => 'OK',
            'newsLetters' => $newsLetters,
        ]);
    }

    /**
     * @method add
     * @param Request $request
     * @return json
     */
    public function add(Request $request)
    {
        try {
            $this->newsletter->create([
                'email' => $request->email,
            ]);
            return response()->json([
                'status' => 'OK',
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 'Failed',
            ]);
        }
    }
}
